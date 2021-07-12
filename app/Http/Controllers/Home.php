<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Kecamatan;
use App\Users;
use App\Siswa;
use Illuminate\Support\Facades\Input;

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

	public function daftar_siswa(){
		$cpassword = null;
		$password = null;
		$nama = null;
		$email = null;
		return view('auth.regist_siswa');
	}

	public function post_akunsiswa(Request $request){
		$cpassword = $request->cpassword;
		$password = $request->password;
		$nama = $request->nama;
		$email = $request->email;

		if ($cpassword != $password) {
			return redirect('/daftar/siswa')->withInput()->with(['warning' => 'Konfirmasi password tidak sama!']);
		}else{

			$users = new Users;
			$users->email =$request->email;
			$users->password = password_hash($request->password, PASSWORD_DEFAULT);
			$users->role = 'siswa';
			$users->status = 'aktif';
			$users->save();

			$id_user = $users->id_user;
			$siswa = new Siswa;
			$siswa->id_user =$id_user;
			$siswa->nama =$request->nama;
			$siswa->email =$request->email;
	        
			
	        $siswa->save();

			return redirect('login')->with(['success' => 'Pendaftaran Berhasil!']);
		}
	}

	public function kategori(){
		$list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')->get();
		$sd = Sekolah::where('tingkat', 'SD');
		$smp = Sekolah::where('tingkat', 'SMP');
		$list_kecamatan = Kecamatan::orderBy('nama_kec', 'ASC')->get();
		return view('general.kategori_kecamatan', compact('list_sekolah','list_kecamatan','sd','smp'));
	}
}