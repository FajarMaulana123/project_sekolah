<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = Users::where('email', $email)->first();
        if($user == null){
            return redirect('/login')->withInput()->with(['danger' => 'Email tidak terdaftar!']);
        }else{

            if($user->role == 'super'){
                if($user){
                    if(Hash::check($password,$user->password)){
                        Session::put('id_user',$user->id_user);
                        Session::put('email',$user->email);
                        Session::put('loginsuper',TRUE);
                        return redirect('/home')->withInput()->with(['success'  => 'Login Berhasil']);
                    }else{
                        return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                    }
                } else {
                    return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                }
            }

            if($user->role == 'admin'){
                if($user->status == 'aktif'){
                    if($user){
                        if(Hash::check($password,$user->password)){
                            Session::put('id_user',$user->id_user);
                            Session::put('email',$user->email);
                            Session::put('loginadmin',TRUE);
                            return redirect('/home')->withInput()->with(['success' => 'Login Berhasil']);
                        }else{
                            return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                        }
                    } else {
                        return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                    }
                } else {
                    return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                }
            }

            if($user->role == 'siswa'){
                if($user->status == 'aktif'){
                    if($user){
                        if(Hash::check($password,$user->password)){
                            Session::put('id_user',$user->id_user);
                            Session::put('email',$user->email);
                            Session::put('loginsiswa',TRUE);
                            return redirect('/')->withInput()->with(['success' => 'Login Berhasil']);
                        }else{
                            return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                        }
                    } else {
                        return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                    }
                } else {
                    return redirect('/login')->withInput()->with(['danger' => 'Password Salah!']);
                }
            }
        }


    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}
