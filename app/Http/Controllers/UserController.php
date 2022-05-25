<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function registerPage()
    {
        return view('pages.register');
    }
    public function userDashboard()
    {
        $data = User::all();
        return view('pages.dashboard2', ['data' => $data]);
    }

    // public function loginPage(){
    //     return view('auth.login');
    // }

    public function userRegister(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|max:16|min:15',
                'name' => 'required'

            ],
            [
                'email.unique' => 'NIK Sudah Terdaftar',
                'name.required' => 'Nama tidak boleh kosong'
            ]
        );

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->email)




        ];
        // dd($data);
        User::create($data);
        return redirect('/');
    }

    public function halamanLogin()
    {
        return view('auth.login');
    }
    public function Login(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'email' => $request->email, 'password' => $request->email])) {
            return redirect('/dashboard');
        }
        return redirect('/')->with('message', 'login gagal NIK dan Nama tidak di temukan');
    }

    public function LogOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
