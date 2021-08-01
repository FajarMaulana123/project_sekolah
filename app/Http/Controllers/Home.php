<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Kecamatan;
use App\Users;
use App\Siswa;
use App\Prestasi;
use App\Agama;
use App\Ppdb;
use App\Pendaftaran;
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

    public function maps($jalur, $id){
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        $id_sekolah = Crypt::decrypt($id);
        return view('general.maps', compact('jalur','id_sekolah','siswa'));
    }
    public function maps_profile($nama){
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        return view('general.maps_profile', compact('nama','siswa'));
    }

	public function daftar(){
		return view('auth.regist_select');
	}

    public function hasil_seleksi(){
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        $pendaftaran = Pendaftaran::join('sekolah', 'sekolah.id_sekolah','=','pendaftaran.id_sekolah')->join('ppdb', 'ppdb.id_sekolah','=','sekolah.id_sekolah')->where('pendaftaran.id_siswa', $siswa->id_siswa)->orderByDesc('id_pendaftaran')->get();
        return view('general.hasil_seleksi', compact('pendaftaran'));
    }

	public function daftar_siswa(){
		$cpassword = null;
		$password = null;
		$nama = null;
		$email = null;
		return view('auth.regist_siswa');
	}

    public function daftar_sekolah(){
        return view('auth.regist_sekolah');
    }

	public function detail_sekolah($nama, $id){
		$id_sekolah = Crypt::decrypt($id);
		$id_user = session::get('id_user');
		$sekolah = Sekolah::join('ppdb','sekolah.id_sekolah','=','ppdb.id_sekolah')->where('sekolah.id_sekolah', $id_sekolah)->first();
		$prestasi = Prestasi::where('id_sekolah', $id_sekolah)->get();
		$siswa = Siswa::where('id_user', $id_user)->first();
		return view('general.detail_sekolah', compact('sekolah','prestasi','siswa'));
	}
	

	public function jalur_pendaftaran($id){
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        $id_sekolah = Crypt::decrypt($id);
		return view('auth.jenis_pendaftaran', compact('id_sekolah', 'siswa'));
	}
    public function jalur($jalur, $id){
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        $id_sekolah = Crypt::decrypt($id);
        if ($jalur == "prestasi") {
            return view('auth.form_sertifikat', compact('id_sekolah', 'jalur','siswa'));
        }else if($jalur == "afirmasi"){
            return view('auth.form_afirmasi', compact('id_sekolah', 'jalur','siswa'));
        }else{
            return view('auth.form_perpindahan', compact('id_sekolah', 'jalur','siswa'));
        }
    }

    public function jalur_update($jalur, $id){
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        $id_sekolah = Crypt::decrypt($id);
        if ($jalur == "prestasi") {
            return view('auth.update_prestasi', compact('id_sekolah', 'jalur','siswa'));
        }else if($jalur == "afirmasi"){
            return view('auth.update_afirmasi', compact('id_sekolah', 'jalur','siswa'));
        }else{
            return view('auth.update_perpindahan', compact('id_sekolah', 'jalur','siswa'));
        }
    }

	public function profile($nama){
		$id_user = session::get('id_user');
		$siswa = Siswa::where('id_user', $id_user)->first();
        $agama = Agama::all();
		return view('general.profile', compact('siswa','agama'));
	}

    public function data_diri($jalur, $id){
        $id_sekolah = Crypt::decrypt($id);
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        $sekolah = Sekolah::where('id_sekolah', $id_sekolah)->first();

        return view('auth.data', compact('siswa','jalur','id_sekolah','sekolah'));
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
        if($request->hasFile('foto')){
            // File::delete('bukti'. $data->bukti);
            $image = $request->file('foto');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['foto'] = $image_name;
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

    public function addsertifikat($prestasi, $id, Request $request){
        $data = $request->all();
        $data = request()->except(['_token']);
        
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
        return redirect('data-diri/'.$prestasi.'/'.$id)->with(['success' => 'Berhasil Update Data diri!']);
    }

    public function addperpindahan($perpindahan, $id, Request $request){
        $data = $request->all();
        $data = request()->except(['_token']);
        
        if($request->hasFile('perpindahan')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('perpindahan');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['perpindahan'] = $image_name;
            }
        }
        

        // $data->update();
        Siswa::where('id_siswa', $request->id_siswa)->update($data);
        return redirect('data-diri/'.$perpindahan.'/'.$id)->with(['success' => 'Berhasil Update Data diri!']);
    }

    public function addzonasi($zonasi, $id, Request $request){
        $data['longitude'] = $request->longitude;
        $data['latitude'] = $request->latitude;


        // $data->update();
        Siswa::where('id_siswa', $request->id_siswa)->update($data);
        return redirect('data-diri/'.$zonasi.'/'.$id)->with(['success' => 'Berhasil Update Data diri!']);
    }

    public function updatetitik($nama, Request $request){
        $data['longitude'] = $request->longitude;
        $data['latitude'] = $request->latitude;


        // $data->update();
        Siswa::where('id_siswa', $request->id_siswa)->update($data);
        return redirect('profile/'.$nama)->with(['success' => 'Berhasil Update Data diri!']);
    }

    public function addafirmasi($afirmasi, $id, Request $request){
        $data = $request->all();
        $data = request()->except(['_token']);
        
        if($request->hasFile('afirmasi')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('afirmasi');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/dokumen';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['afirmasi'] = $image_name;
            }
        }
        

        // $data->update();
        Siswa::where('id_siswa', $request->id_siswa)->update($data);
        return redirect('data-diri/'.$afirmasi.'/'.$id)->with(['success' => 'Berhasil Update Data diri!']);
    }

    public function pendaftaran(Request $request){
        $jalur = $request->jalur;
        $sekolah = Sekolah::where('id_sekolah', $request->id_sekolah)->first();
        $id_user = session::get('id_user');
        $siswa = Siswa::where('id_user', $id_user)->first();
        
        $thn_ajar = Ppdb::where('id_sekolah', $request->id_sekolah)->first();
        $data = $request->all();
        $data = request()->except(['_token']);
        if ($jalur == "zonasi") {
            $my_latitude = $siswa['latitude'];
            $my_longitude = $siswa['longitude'];
            $her_latitude = $sekolah['latitude'];
            $her_longitude = $sekolah['longitude'];

            $distance = round((((acos(sin(($my_latitude*pi()/180)) * sin(($her_latitude*pi()/180))+cos(($my_latitude*pi()/180)) * cos(($her_latitude*pi()/180)) * cos((($my_longitude- $her_longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344), 2);
            $data['jarak'] = $distance;
        }
        $data['tahun_ajaran'] = $thn_ajar->tahun_ajaran;
        $data['daya_tampung'] = $thn_ajar->daya_tampung;
        $data['status'] = 0;
        Pendaftaran::insert($data);
        
        return view('auth.informasi', compact('jalur','sekolah'));
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

    public function post_akunsekolah(Request $request){
        $cpassword = $request->cpassword;
        $password = $request->password;
        $nama = $request->nama;
        $email = $request->email;

        if ($cpassword != $password) {
            return redirect('/daftar/sekolah')->withInput()->with(['warning' => 'Konfirmasi password tidak sama!']);
        }else{

            $users = new Users;
            $users->email =$request->email;
            $users->password = password_hash($request->password, PASSWORD_DEFAULT);
            $users->role = 'admin';
            $users->status = 'nonaktif';
            $users->save();

            $id_user = $users->id_user;
            $sekolah = new Sekolah;
            $sekolah->id_user =$id_user;
            $sekolah->nama_sekolah =$request->nama_sekolah;
            $sekolah->email =$request->email;
            if($request->hasFile('bukti')){
                // File::delete('imageUpload/sekolah'. $data->foto);
                $image = $request->file('bukti');

                if($image->isValid()){
                    $image_name = $image->getClientOriginalName();
                    $upload_path = 'imageUpload/dokumen';
                    $image->move($upload_path, $image_name);
                    // $bank->gambar = $image_name;
                    $sekolah['bukti'] = $image_name;
                }
            }
            
            
            $sekolah->save();

            return redirect('login')->with(['success' => 'Pendaftaran Berhasil!']);
        }
    }

	public function kategori($kecamatan, $id){
        $date = Carbon\Carbon::now();
        $id_kec = Crypt::decrypt($id); 
		$list_sekolah_sd = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')
        ->join('ppdb','sekolah.id_sekolah','=','ppdb.id_sekolah')
        ->where('ppdb.tgl_mulai','<=', $date->toDateString())
        ->where('ppdb.tgl_berakhir', '>=', $date->toDateString())
        ->where('sekolah.id_kec', $id_kec)
        ->where('sekolah.tingkat', 'SD')
        ->get();
        $list_sekolah_smp = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')
        ->join('ppdb','sekolah.id_sekolah','=','ppdb.id_sekolah')
        ->where('ppdb.tgl_mulai','<=', $date->toDateString())
        ->where('ppdb.tgl_berakhir', '>=', $date->toDateString())
        ->where('sekolah.id_kec', $id_kec)
        ->where('sekolah.tingkat', 'SMP')
        ->get();
		$sd = Sekolah::where('tingkat', 'SD');
		$smp = Sekolah::where('tingkat', 'SMP');
		$list_kecamatan = Kecamatan::orderBy('nama_kec', 'ASC')->get();
		return view('general.kategori_kecamatan', compact('list_sekolah_sd','list_sekolah_smp','list_kecamatan','sd','smp','kecamatan'));
	}
}