<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Users;

class Home extends Controller
{
	public function index(){
		$list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')->get();;
		return view('general.index', compact('list_sekolah'));
	}

	public function daftar(){
		return view('auth.regist_select');
	}
}