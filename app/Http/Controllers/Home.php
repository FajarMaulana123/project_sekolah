<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Kecamatan;
use App\Users;

class Home extends Controller
{
	public function index(){
		$list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')->get();
		$sd = Sekolah::where('tingkat', 'SD');
		$smp = Sekolah::where('tingkat', 'SMP');
		$list_kecamatan = Kecamatan::orderBy('nama_kec', 'ASC')->get();
		return view('general.index', compact('list_sekolah','list_kecamatan','sd','smp'));
	}

	public function daftar(){
		return view('auth.regist_select');
	}

	public function kategori(){
		$list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')->get();
		$sd = Sekolah::where('tingkat', 'SD');
		$smp = Sekolah::where('tingkat', 'SMP');
		$list_kecamatan = Kecamatan::orderBy('nama_kec', 'ASC')->get();
		return view('general.kategori_kecamatan', compact('list_sekolah','list_kecamatan','sd','smp'));
	}
}