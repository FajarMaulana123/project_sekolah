<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Pendaftaran;
use App\Prestasi;
use App\Sekolah;
use App\Kecamatan;

class HomeController extends Controller
{
	public function index(){
		if(!Session::get('loginsuper') && !Session::get('loginadmin')){
			return redirect('/login');
		} else {
			// dd('s');
			if(Session::get('loginsuper')){
				$tot_sekolah = Sekolah::count();
				$tot_kecamatan = Kecamatan::count();
				return view('admin.index', compact('tot_sekolah', 'tot_kecamatan'));
			}else{

				$id = Session::get('id_user');
				$sekolah = Sekolah::where('id_user', $id)->first();
				$thn = date('Y') .' / '. date('Y', strtotime('+1 year'));
				$tot_pres = Prestasi::where('id_sekolah', $sekolah->id_sekolah)->count();
				$tot_zonasi = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('tahun_ajaran', $thn)->where('jalur', 'zonasi')->count();
				$tot_afirmasi = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('tahun_ajaran', $thn)->where('jalur', 'afirmasi')->count();
				$tot_prestasi = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('tahun_ajaran', $thn)->where('jalur', 'prestasi')->count();
				$tot_perpindahan = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('tahun_ajaran', $thn)->where('jalur', 'perpindahan-orang-tua')->count();
				return view('admin.index', compact('tot_pres','tot_zonasi','tot_afirmasi','tot_prestasi','tot_perpindahan'));
			}
			

		}
	}
}