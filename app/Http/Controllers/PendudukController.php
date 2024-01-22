<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class PendudukController extends Controller
{
    public function loginHandler(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
          $request->validate([
            'login_id'=>'required|email|exists:penduduks,email',
            'password'=>'required|min:5|max:45'
          ],[
            'login_id.required'=>'Email atau Username belum terdaftar',
            'login_id.email'=>'email tidak valid',
            'login_id.exists'=>'Email belum terdaftar',
            'password.required'=>'Password harus diisi'
          ]);         
        }else{
            $request->validate([
                'login_id'=>'required|exists:penduduks,username',
                'password'=>'required|min:5|max:45'
            ],[
                'login_id.required'=>'Email atau Username belum terdaftar',
                'login_id.exists'=>'Username belum terdaftar',
                'password.required'=>'Password harus diisi'
            ]);
        }

        $creds = array(
            $fieldType=>$request->login_id,
            'password'=>$request->password
        );
        
        if( Auth::guard('penduduk')->attempt($creds) ){
            return redirect()->route('penduduk.home');
        }else{
            session()->flash('fail','Username dan password tidak sesuai');
            return redirect()->route('penduduk.login');
        }
    }

    public function logoutHandler(Request $request){
        Auth::guard('penduduk')->logout();
        session()->flash('fail','Anda telah Logout');
        return redirect()->route('penduduk.login');
    } 
    public function profileView(Request $request){
        $penduduk = null;
        if( Auth::guard('penduduk')->check() ){
            $penduduk = Penduduk::findOrFail(auth()->id());
        }
        return view('back.pages.penduduk.profile', compact('penduduk'));
    }
}
