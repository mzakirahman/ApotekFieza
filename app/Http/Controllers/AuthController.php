<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function proses_login(Request $request){
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

            $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)){
                $user = Auth::user();
                if ($user->level == 'PemilikApotek'){
                    return redirect()->intended('/admin/dataobat');
                } elseif ($user->level == 'Karyawan'){
                    return redirect()->intended('/dashboard/dataobat');
                }
                return redirect()->intended('/');
            }
            return redirect('login');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
