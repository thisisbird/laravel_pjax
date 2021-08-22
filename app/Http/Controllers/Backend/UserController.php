<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\BackendUser;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class UserController extends Controller
{

    public function index(Request $request)
    {
        if($request->search){
            $users = BackendUser::where('name','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->orWhere('account','like','%'.$request->search.'%')->get();
        }else{
            $users = BackendUser::all();
        }
        // return view('backend.layout-concept.app',compact('users','request'));
        return view('backend.user.index',compact('users','request'));
    }  
      

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            if(Auth::guard('backend')->check()){
                return redirect()->route('backend.user.dashboard');
            }
            return view('backend.user.login');
        }

        $request->validate([
            'account' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('account', 'password');
        $remember = $request->remember ?? 0;
        if (Auth::guard('backend')->attempt($credentials,$remember)) {
            //intended 紀錄之前的網址
            return redirect()->intended('back/dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect()->route('backend.user.login')->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('backend.user.registration');
    }
      

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect()->route('backend.user.dashboard')->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return BackendUser::create([
        'account' => $data['account'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function signOut() {
        Session::flush();
        Auth::guard('backend')->logout();
  
        return Redirect()->route('backend.user.login');
    }
    public function dashboard()
    {
        if(Auth::guard('backend')->check()){
            return view('backend.dashboard');
        }
  
        return redirect()->route('backend.user.login')->withSuccess('You are not allowed to access');
    }
    public function dashboard2()
    {
        if(Auth::guard('backend')->check()){
            return view('backend.dashboard2');
        }
  
        return redirect()->route('backend.user.login')->withSuccess('You are not allowed to access');
    }
}