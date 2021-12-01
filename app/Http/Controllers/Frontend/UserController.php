<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Hash;
use Session;
use Cookie;
use App\Models\Frontend\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Role;
class UserController extends Controller
{

    public function index(Request $request)
    {
        if ($request->search) {
            $users = User::where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('account', 'like', '%' . $request->search . '%')->get();
        } else {
            $users = User::all();
        }
        return view('frontend.user.index', compact('users', 'request'));
    }


    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            if (Auth::guard('web')->check()) {
                return redirect('/product_list');
            }
            Cookie::queue('pre_url', url()->previous(), 50000);//如果不適用上面的use Cookie,這裏可以直接調用 \Cookie
            return view('frontend.user.login');
        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->remember ?? 0;
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            //intended 紀錄之前的網址
            if($this->getCart()->count()){
                $this->getCart(Auth::user()->id)->delete();
                $this->getCart()->update(['user_id'=>Auth::user()->id]);//登入後更新購物車
                //todo 清除user_cart的cookies

            }
            return redirect()->intended(Cookie::get('pre_url'))
                ->withSuccess('Signed in');
        }
        return redirect()->route('frontend.user.login')->withErrors('Login details are not valid');
    }



    public function registration()
    {
        return view('frontend.user.registration');
    }


    public function postRegistration(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        );
        $message = array(
            'sex.required' => '性別為必填',
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $check = $this->create($data);
        if($check){
            Auth::guard('web')->loginUsingId($check->id);
        }
        // return redirect()->route('frontend.user.info')->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function edit($id)
    {
        $user = User::findorFail($id);
        $roles = Role::get();
        return view('frontend.user.edit', compact('user','roles'));
    }
    
    public function update($id, Request $req)
    {
        if($req->password === null){
            $req->request->remove('password');
        }
        
        $rules = array(
            'name' => 'required',
            'account' => "required|unique:backend_users,account,{$id}", //unique:table,欄位,排除的id
            'password' => 'between:6,12',
        );
        $message = array(
            'sex.required' => '性別為必填',
        );
        $validator = Validator::make($req->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $user = User::findorFail($id);
            $user->name = $req->name;
            $user->account = $req->account;
            $user->email = $req->email;
            $user->role_id = $req->role_id;
            $user->save();
            return redirect()->route('frontend.user.index');
        } catch (\Exception $e) {
            return response()->json(['result' => $e->getMessage()], 422);
        }
    }


    public function signOut()
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->back();
        // return redirect()->route('frontend.user.login');
    }
    public function dashboard()
    {
        if (Auth::guard('web')->check()) {
            return view('frontend.dashboard');
        }

        return redirect()->route('frontend.user.login')->withSuccess('You are not allowed to access');
    }
    public function dashboard2()
    {
        if (Auth::guard('web')->check()) {
            return view('frontend.dashboard2');
        }

        return redirect()->route('frontend.user.login')->withSuccess('You are not allowed to access');
    }
}
