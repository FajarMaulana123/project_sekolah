<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Users;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SekolahController extends Controller
{
	public function index(){
        if (!session::get('loginsuper')) {
            return redirect('login');
        }else{
            $list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')->get();
            
            return view('admin.sekolah.index',compact('list_sekolah'));
        }
	}

	public function create(){
        if (!session::get('loginsuper')) {
            return redirect('login');
        }else{
		return view ('admin.sekolah.create');
        }
	}

    public function detail($id){
        $sekolah = Sekolah::findOrfail($id);
        echo json_encode($sekolah);
    }

	public function add(Request $request){
		$users = new Users;
		$users->email =$request->email;
		$users->password = password_hash($request->nohp, PASSWORD_DEFAULT);
		$users->role = 'admin';
		$users->status = 'nonaktif';
		$users->save();

		$id_user = $users->id_user;
		$sekolah = new Sekolah;
		$sekolah->id_user =$id_user;
		$sekolah->nama_sekolah =$request->nama_sekolah;
		$sekolah->nama_kps =$request->nama_kps;
		$sekolah->tingkat =$request->tingkat;
		$sekolah->email =$request->email;
		$sekolah->nohp =$request->nohp;
		$sekolah->alamat =$request->alamat;
		$sekolah->deskripsi =$request->deskripsi;
		$sekolah->daya_tampung =$request->daya_tampung;
		$sekolah->jml_diterima =$request->jml_diterima;
		if($request->hasFile('bukti')){
            $image = $request->file('bukti');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'bukti';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $sekolah['bukti'] = $image_name;
            }
        }
        if($request->hasFile('logo')){
            $image = $request->file('logo');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/logo';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $sekolah['logo'] = $image_name;
            }
        }
        if($request->hasFile('foto')){
            $image = $request->file('foto');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/sekolah';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $sekolah['foto'] = $image_name;
            }
        }
        $sekolah->save();

		return redirect('sekolah')->with(['success' => 'Berhasil Tambah Data!']);
	}
	public function acc($id)
	{
		$data = Users::where('id_user',$id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang == 'aktif'){
            Users::where('id_user',$id)->update([
                'status'=> 'nonaktif'
            ]);
            return redirect('sekolah')->with(['success' => 'Sekolah tidak di ACC!']);
        }else{
            Users::where('id_user',$id)->update([
                'status'=> 'aktif'
            ]);
            return redirect('sekolah')->with(['success' => 'Berhasil ACC Sekolah!']);
        }
		
	}

    public function edit($sekolah){
        if (!session::get('loginsuper')) {
            return redirect('login');
        }else{
        $data = Sekolah::where('id_sekolah', $sekolah)->first();
        return view('admin.sekolah.edit', compact('data'));
        }

    }

    public function update(Request $request){
        $id_sekolah = $request->id_sekolah;
        $data = Sekolah::find($id_sekolah);
        // $data->id_user =$id_user;
		$data->nama_sekolah =$request->nama_sekolah;
		$data->nama_kps =$request->nama_kps;
		$data->tingkat =$request->tingkat;
		$data->email =$request->email;
		$data->nohp =$request->nohp;
		$data->alamat =$request->alamat;
		$data->deskripsi =$request->deskripsi;
		$data->daya_tampung =$request->daya_tampung;
		$data->jml_diterima =$request->jml_diterima;
        if($request->hasFile('bukti')){
            // File::delete('bukti'. $data->bukti);
            $image = $request->file('bukti');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'bukti';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['bukti'] = $image_name;
            }
        }
        if($request->hasFile('logo')){
            // File::delete('imageUpload/logo'. $data->logo);
            $image = $request->file('logo');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/logo';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['logo'] = $image_name;
            }
        }
        if($request->hasFile('foto')){
            // File::delete('imageUpload/sekolah'. $data->foto);
            $image = $request->file('foto');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'imageUpload/sekolah';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $data['foto'] = $image_name;
            }
        }

        $data->update();
        return redirect('sekolah')->with(['success' => 'Berhasil diedit']);
    }

    public function hapus($sekolah)
	{
		$data = Sekolah::findOrFail($sekolah);
		$data->delete();
		return redirect('sekolah')->with(['success' => 'Berhasil Hapus Data!']);
	}

}