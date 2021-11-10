<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Backend\Permissions;
use Illuminate\Http\Request;
use Storage;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            Permissions::sidebar();
            return $next($request);
        });
    }

    public function uploadImage(Request $request){
      $path = $request->image->store('/public/image');
      $url = Storage::url($path);
      return $url;
    }
    
    public function uploadImagePath($image){
        $path = $image->store('/public/image');
        $path = Storage::url($path);
        return $path;
    }
    public function deleteImagePath($path){
      return false;//先不刪除 複製功能使用
      $path = str_replace('storage','public',$path);
      Storage::delete($path);
    }
}
