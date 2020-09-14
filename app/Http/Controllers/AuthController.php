<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function register()
    {
        return view('admin.auth.register');
    }
    public function registrationProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'user')->withInput();
        }
        $encryptPassword = bcrypt($request->password);
        $request->merge([
            'password' => $encryptPassword,
        ]);
        User::create($request->all());
        return redirect('/login');
    }
    public function loginProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|exists:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'user')->withInput();
        }
        $credentials    = $request->only('name', 'password');
        $isLoginSuccess = Auth::attempt($credentials);
        // dd($isLoginSuccess);
        if ($isLoginSuccess) {
            return redirect()->intended('/admin/');
        } else {
            return redirect()->back()->withInput()->with('error', 'Wrong Password!!!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
