<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $msg = 'ログインしました。';
        }else{
            $msg = 'ログインできませんでした。';
        }
        return view('users.login',['message'=>$msg]);
    }
    public function new(){
        return view('users.signup');
    }
    public function signup(Request $data)
    {
        if (User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])){
            $msg = '新規登録しました。';
        }else{
            $msg = '新規登録に失敗しました。';
        }
        return view('users.login',['message' => $msg]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->action('UsersController@login');
    }
}
