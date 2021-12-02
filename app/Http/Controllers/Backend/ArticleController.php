<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Article;
use App\Models\Backend\ArticleMenu;
use App\Models\Backend\ArticleInfo;
use App\Models\Backend\ArticleMenuArticle;
use DB;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private function common($request)
    {
        if ($request->language != 'en' && $request->language != 'tw') {
            $request->language = 'tw';
        }
        $datas = Article::with('menu', 'info');
        if ($request->search) {
            $keyword = '%' . $request->search . '%';
            $article_ids = ArticleInfo::where('name', 'like', $keyword)->orWhere('price',$request->search)->orWhere('o_price',$request->search)->orWhere('cost',$request->search)->pluck('article_id')->toArray();
            $datas = $datas->where(function($q) use ($article_ids,$keyword){
                $q->whereIn('id', $article_ids)->orWhere('code', 'like', $keyword);
            });
        } 
        if ($request->menu) {
            $article_ids = ArticleMenuArticle::whereIn('article_menu_id',$request->menu)->pluck('article_id')->toArray();
            $datas = $datas->whereIn('id', $article_ids);
        }    
        if ($request->is_display === '1' || $request->is_display === '0') $datas = $datas->where('is_display',$request->is_display);
        if ($request->is_shopping === '1' || $request->is_shopping === '0') $datas = $datas->where('is_shopping',$request->is_shopping);
        if ($request->is_hot === '1' || $request->is_hot === '0') $datas = $datas->where('is_hot',$request->is_hot);
        if ($request->is_new === '1' || $request->is_new === '0') $datas = $datas->where('is_new',$request->is_new);
        
        $datas = $datas->get();
        
        $menus = ArticleMenu::getMenuTree();
        return ['datas' => $datas, 'menus' => $menus, 'request' => $request];
    }
    public function index(Request $request)
    {
        $common = $this->common($request);
        $menus = $common['menus'];
        $datas = $common['datas'];
        return view('backend.article.index', compact('datas', 'menus', 'request'));
    }
    public function edit(Request $request, $id)
    {
        $common = $this->common($request);
        $menus = $common['menus'];
        $datas = $common['datas'];
        $select_data = Article::with('menu', 'info')->find($id);
        $select_menu = ArticleMenu::find($id);
        return view('backend.article.index', compact('datas', 'request', 'select_data', 'menus', 'select_menu'));
    }
    public function update(Request $request)
    {

        $rules = array(
            'title' => 'required',
        );
        $message = array(
            'title.required' => '文章名稱必填',
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            //文章主體
            $article = Article::find($request->data_id);
            if(!$article) $article = new Article();
            $article->user_id = Auth::guard('backend')->user()->id;
            $article->sort = $request->sort ?? 0; //none
            $article->is_display = $request->is_display ?? 0;
            $img = $article->photo ?? [];

            if($request->sort_cover){
                $sort_cover = explode(',',$request->sort_cover);
                foreach ($sort_cover as $photo) {
                    $img[] = $photo;
                }
            }
            if($request->delete_cover){
                $delete_cover = explode(',',$request->delete_cover);
                foreach ($delete_cover as $photo) {
                    if (($key = array_search($photo, $img)) !== false) {
                        unset($img[$key]);
                        $this->deleteImagePath($photo);
                    }
                }
            }

            if($request->cover && count($request->cover)){
                foreach ($request->cover as $i => $cover) {
                    if($cover != null){
                        $img[] = $this->uploadImagePath($cover);
                    }
                }
            }

            $img = array_values($img);
            $article->photo = $img; //none

            $article->save();

            $article_id = $request->data_id ?? $article->id;

            if ($request->menu && count($request->menu)) {
                $menu_data = [];
                ArticleMenuArticle::where('article_id',$article_id)->delete();
                foreach ($request->menu as  $menu_id) {
                    $menu_data[] = ['article_id'=>$article_id,'article_menu_id'=>$menu_id];
                }
                ArticleMenuArticle::insert($menu_data);
            }


            //中英文價格資訊
            $info_data = [
                'article_id' => $article_id,
                'language' => $request->language ?? 'tw',
                'title' => $request->title ?? '',
                'discription' => $request->discription ?? ''
            ];
            $article_info = ArticleInfo::where('article_id', $article_id)->where('language', $request->language)->update($info_data);
            if (!$article_info) ArticleInfo::create($info_data);

            
            DB::commit();
            return redirect()->back()->withSuccess('更新成功');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request->menu_id) {
                $data = ArticleMenu::find($request->menu_id);
                if ($data) {
                    $menu2 = ArticleMenu::where('p_id', $data->id);
                    if ($menu2->get()->count()) {
                        $menu2_ids = $menu2->pluck('id');
                        ArticleMenu::whereIn('p_id', $menu2_ids)->delete();
                        $menu2->delete();
                    }
                    $data->delete();
                }
            }
            DB::commit();
            return redirect()->back()->withSuccess('刪除成功');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function deletePhoto(Request $request){
        return response()->json(['success'=>true], 200);
    }
}
