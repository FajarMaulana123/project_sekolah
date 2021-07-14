<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Kecamatan;
use App\Users;
use App\Siswa;
use App\Prestasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Crypt;
use Carbon;

class Home extends Controller
{
	public function index(){
		$date = Carbon\Carbon::now();
		$list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')
		->join('ppdb','sekolah.id_sekolah','=','ppdb.id_sekolah')
		->select('ppdb.*', 'sekolah.*')
		->where('ppdb.tgl_mulai','<=', $date->toDateString())
		->where('ppdb.tgl_berakhir', '>=', $date->toDateString())
		->get();
		$sd = Sekolah::where('tingkat', 'SD');
		$smp = Sekolah::where('tingkat', 'SMP');
		$list_kecamatan = Kecamatan::orderBy('nama_kec', 'ASC')->get();
		
		
		// dd();
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

	public function detail_sekolah($nama, $id){
		$id_sekolah = Crypt::decrypt($id);
		$id_user = session::get('id_user');
		$sekolah = Sekolah::join('ppdb','sekolah.id_sekolah','=','ppdb.id_sekolah')->where('sekolah.id_sekolah', $id_sekolah)->first();
		$prestasi = Prestasi::where('id_sekolah', $id_sekolah)->get();
		$siswa = Siswa::where('id_user', $id_user)->first();
		return view('general.detail_sekolah', compact('sekolah','prestasi','siswa'));
	}

	public function jalur_pendaftaran(){
		return view('auth.jenis_pendaftaran');
	}

	public function profile($nama){
		$id_user = session::get('id_user');
		$siswa = Siswa::where('id_user', $id_user)->first();
		return view('general.profile', compact('siswa'));
	}

	public function editsiswa(Request $request){
		$data = $request->all();
        $data = request()->except(['_token']);
		if($request->hasFile('akte')){
            // File::delete('bukti'. $data->bukti);
            $image = $request->file('akte');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['akte'] = $image_name;
            }
        }
        if($request->hasFile('ijazah')){
            // File::delete('imageUpload/logo'. $data->logo);
            $image = $request->file('ijazah');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['ijazah'] = $image_name;
            }
        }
        if($request->hasFile('skhun')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('skhun');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['skhun'] = $image_name;
            }
        }
        if($request->hasFile('kk')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('kk');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['kk'] = $image_name;
            }
        }
        if($request->hasFile('sertifikat1')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('sertifikat1');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['sertifikat1'] = $image_name;
            }
        }
        if($request->hasFile('sertifikat2')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('sertifikat2');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['sertifikat2'] = $image_name;
            }
        }
        if($request->hasFile('sertifikat3')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('sertifikat3');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['sertifikat3'] = $image_name;
            }
        }

        // $data->update();
        Siswa::where('id_siswa', $request->id_siswa)->update($data);
        return redirect('profile/'.$request->nama)->with(['success' => 'Berhasil Update Data diri!']);
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