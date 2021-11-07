<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Frontend\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Role;
class ProductController extends Controller
{

    public function index(Request $request)
    {
        if ($request->search) {
            $users = User::where('name', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('account', 'like', '%' . $request->search . '%')->get();
        } else {
            $users = User::all();
        }
        return view('backend.user.index', compact('users', 'request'));
    }


    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            if (Auth::guard('backend')->check()) {
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
        if (Auth::guard('backend')->attempt($credentials, $remember)) {
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
        $rules = array(
            'name' => 'required',
            'account' => 'required|unique:backend_users',
            'email' => 'required|email|unique:backend_users',
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
            Auth::guard('backend')->loginUsingId($check->id);
        }
        return redirect()->route('backend.user.dashboard')->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'account' => $data['account'],
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'] ?? 1,
            'password' => Hash::make($data['password'])
        ]);
    }

    public function edit($id)
    {
        $user = User::findorFail($id);
        $roles = Role::get();
        return view('backend.user.edit', compact('user','roles'));
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
            return redirect()->route('backend.user.index');
        } catch (\Exception $e) {
            return response()->json(['result' => $e->getMessage()], 422);
        }
    }


    public function signOut()
    {
        Session::flush();
        Auth::guard('backend')->logout();
        return redirect()->route('backend.user.login');
    }
    public function dashboard()
    {
        if (Auth::guard('backend')->check()) {
            return view('backend.dashboard');
        }

        return redirect()->route('backend.user.login')->withSuccess('You are not allowed to access');
    }
    public function dashboard2()
    {
        if (Auth::guard('backend')->check()) {
            return view('backend.dashboard2');
        }

        return redirect()->route('backend.user.login')->withSuccess('You are not allowed to access');
    }
}
