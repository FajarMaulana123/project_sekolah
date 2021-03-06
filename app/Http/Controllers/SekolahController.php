<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Kecamatan;
use App\Users;
use App\Prestasi;
use App\TahunAjaran;
use App\Ppdb;
use App\Agama;
use App\Pendaftaran;
use App\Hasilseleksi;
use App\User;
use Crypt;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SekolahController extends Controller
{
	public function index(){
        if (!session::get('loginsuper')) {
            return redirect('login');
        }else{
            $list_sekolah = Sekolah::join('users', 'sekolah.id_user', '=', 'users.id_user')->get();
            // dd($list_sekolah);
            $data = [];
            foreach($list_sekolah as $key){
                $ppdb = Ppdb::where('id_sekolah', $key->id_sekolah)->first();
                if(isset($ppdb)){
                 $dt = $ppdb['daya_tampung'];
                 $jd = $ppdb['jml_diterima'];
             }else{
                 $dt = 0;
                 $jd = 0;
             }
             $data[]  = [
                'id_user' => $key->id_user,
                'id_sekolah' => $key->id_sekolah,
                'nama_sekolah' => $key->nama_sekolah,
                'nama_kps' => $key->nama_kps,
                'daya_tampung' => $dt,
                'jml_diterima' => $jd,
                'status' => $key->status,
                'tingkat' => $key->tingkat,
                'email' => $key->email,
                'nohp' => $key->nohp,
                'alamat' => $key->alamat,
                'visimisi' => $key->visimisi,
                'deskripsi' => $key->deskripsi,
                'bukti' => $key->bukti,
                'logo' => $key->logo,
                'foto' => $key->foto,
                'longitude' => $key->longitude,
                'latitude' => $key->latitude
            ];  

        }


        return view('admin.sekolah.index',compact('data'));
    }
}

public function create(){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        $list_kec = Kecamatan::orderBy('nama_kec', 'ASC')->get();
        return view ('admin.sekolah.create', compact('list_kec'));
    }
}

public function maps_sekolah($nama, $id){
    $id_sekolah = Crypt::decrypt($id);
    $sekolah = Sekolah::where('id_sekolah', $id_sekolah)->first();
    return view('general.maps_sekolah', compact('id_sekolah','nama','sekolah'));
}

public function update_lokasi($nama, $id, Request $request){
    $data['longitude'] = $request->longitude;
    $data['latitude'] = $request->latitude;
    $nama_sekolah = str_replace(' ', '-', strtolower($nama));
    $id_sekolah = Crypt::decrypt($id);

        // $data->update();
    Sekolah::where('id_sekolah', $id_sekolah)->update($data);
    return redirect('profile-sekolah/'.$nama_sekolah)->with(['success' => 'Berhasil Update Data diri!']);
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
  $sekolah->id_kec =$request->id_kec;
  $sekolah->nama_sekolah =$request->nama_sekolah;
  $sekolah->nama_kps =$request->nama_kps;
  $sekolah->tingkat =$request->tingkat;
  $sekolah->email =$request->email;
  $sekolah->nohp =$request->nohp;
  $sekolah->alamat =$request->alamat;
  $sekolah->visimisi =$request->visimisi;
  $sekolah->deskripsi =$request->deskripsi;
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
        $list_kec = Kecamatan::orderBy('nama_kec', 'ASC')->get();
        return view('admin.sekolah.edit', compact('data','list_kec'));
    }

}

public function update(Request $request){
    $id_sekolah = $request->id_sekolah;
    $data = Sekolah::find($id_sekolah);
        // $data->id_user =$id_user;
    $data->id_kec =$request->id_kec;
    $data->nama_sekolah =$request->nama_sekolah;
    $data->nama_kps =$request->nama_kps;
    $data->tingkat =$request->tingkat;
    $data->email =$request->email;
    $data->nohp =$request->nohp;
    $data->alamat =$request->alamat;
    $data->visimisi =$request->visimisi;
    $data->deskripsi =$request->deskripsi;
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

public function prestasi(){
    if (!session::get('loginadmin')) {
        return redirect('login');
    }else{
        $id = Session::get('id_user');
        $i = Sekolah::where('id_user', $id)->first();
        $list_pres = Prestasi::where('id_sekolah', $i->id_sekolah)->get();
        return view('admin.prestasi.index', compact('list_pres'));
    }
}

public function create_prestasi(){
    if (!session::get('loginadmin')) {
        return redirect('login');
    }else{
            // dd('ss');
        return view('admin.prestasi.create');
    }
}

public function post_prestasi(Request $request){
    $id = Session::get('id_user');
    $i = Sekolah::where('id_user', $id)->first();
        // $list_pres = Prestasi::where('id_sekolah', $i->id_sekolah)->get();

    $data = new Prestasi;
    $data->id_sekolah = $i->id_sekolah;
    $data->judul = $request->judul;
    $data->deskripsi = $request->deskripsi;
    $data->save();
    return redirect('/prestasi')->with(['success' => 'Berhasil Tambah Data!']);
}

public function edit_prestasi($id){
    if (!session::get('loginadmin')) {
        return redirect('login');
    }else{
        $data = Prestasi::where('id_prestasi',$id)->first();
        return view('admin.prestasi.edit', compact('data'));
    }
}

public function update_prestasi(Request $request, $id){
    Prestasi::where('id_prestasi',$id)->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ]);
    return redirect('/prestasi')->with(['success' => 'Berhasil Edit Data!']);
}

public function hapus_prestasi($id){
    $data = Prestasi::findOrFail($id);
    $data->delete();
    return redirect('/prestasi')->with(['success' => 'Berhasil Hapus Data!']);
}

public function tahunajaran(){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        $data = TahunAjaran::all();
        return view('admin.tahun_ajaran.index', compact('data'));
    }
}

public function create_thajaran(){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        return view('admin.tahun_ajaran.create');
    }
}

public function post_thajaran(Request $request){
    $data = new TahunAjaran;
    $data->tahun_ajaran = $request->tahun_ajaran;
    $data->save();
    return redirect('/tahunajaran')->with(['success' => 'Berhasil Tambah Data!']);
}

public function edit_thajaran($id){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        $data = TahunAjaran::where('id_tahunajaran', $id)->first();
        return view('admin.tahun_ajaran.edit', compact('data'));
    }
}

public function update_thajaran(Request $request){
    TahunAjaran::where('id_tahunajaran', $request->id)->update([
        'tahun_ajaran' => $request->tahun_ajaran,
    ]);
    return redirect('/tahunajaran')->with(['success' => 'Berhasil Edit Data!']);
}

public function hapus_thajaran($id){
    $data = TahunAjaran::findOrFail($id);
    $data->delete();
    return redirect('/tahunajaran')->with(['success' => 'Berhasil Hapus Data!']);
}

public function ppdb_sekolah(){
    if (!session::get('loginadmin')) {
        return redirect('login');
    }else{
        $data = TahunAjaran::all();
        $id = Sekolah::where('id_user', Session::get('id_user'))->first();
        $ppdb = Ppdb::where('id_sekolah', $id->id_sekolah)->first();
            // dd($ppdb);
        return view('admin.ppdb.index', compact('data','id','ppdb'));
        
    }
}

public function update_ppdb(Request $request){
    $j = Ppdb::where('id_sekolah', $request->id_sekolah)->count();
    if($j <= 0){
        $data = new Ppdb;
        $data->id_sekolah = $request->id_sekolah;
        $data->tahun_ajaran = $request->tahun_ajaran;
        $data->daya_tampung = $request->daya_tampung;
        $data->jml_diterima = $request->jml_diterima;
        $data->tgl_mulai = $request->tgl_mulai;
        $data->tgl_berakhir = $request->tgl_berakhir;
            // dd($data);
        $data->save();
    } else {
        Ppdb::where('id_sekolah', $request->id_sekolah)->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'daya_tampung' => $request->daya_tampung,
            'jml_diterima' => $request->jml_diterima,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_berakhir' => $request->tgl_berakhir,
        ]);
    }
    return redirect('/ppdb_sekolah')->with(['success' => 'Berhasil Update Data!']);
}

public function agama(){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        $data = Agama::all();
        return view('admin.agama.index', compact('data'));
    }
}

public function create_agama(){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        return view('admin.agama.create');
    }
}

public function post_agama(Request $request){
    $data = new Agama;
    $data->nama_agama = $request->nama_agama;
    $data->save();
    return redirect('/agama')->with(['success' => 'Berhasil Tambah Data!']);
}

public function edit_agama($id){
    if (!session::get('loginsuper')) {
        return redirect('login');
    }else{
        $data = Agama::where('id_agama', $id)->first();
        return view('admin.agama.edit', compact('data'));
    }
}

public function update_agama(Request $request){
    Agama::where('id_agama', $request->id)->update([
        'nama_agama' => $request->nama_agama,
    ]);
    return redirect('/agama')->with(['success' => 'Berhasil Edit Data!']);
}

public function hapus_agama($id){
    $data = Agama::findOrFail($id);
    $data->delete();
    return redirect('/agama')->with(['success' => 'Berhasil Hapus Data!']);
}

public function data_daftar(){
    if (!session::get('loginadmin')) {
        return redirect('login');
    }else{
        $sekolah = Sekolah::where('id_user',Session::get('id_user'))->first();
        // $thn = date('Y');
        // $thn_ajar = $thn ." / ". date('Y', strtotime('+1 year'));
        $ppdb = Ppdb::where('id_sekolah', $sekolah->id_sekolah)->first();
        $data = Pendaftaran::join('siswa', 'pendaftaran.id_siswa', '=', 'siswa.id_siswa')
        ->where('pendaftaran.id_sekolah', $sekolah->id_sekolah)
        ->where('pendaftaran.tahun_ajaran', $ppdb->tahun_ajaran)
        ->select('pendaftaran.*', 'siswa.*')
        ->get();
        
        return view('admin.data_daftar.index', compact('data', 'ppdb'));
    }
}

public function status_daftar(Request $request){
    $sekolah = Sekolah::where('id_user',Session::get('id_user'))->first();
    $ppdb = Ppdb::where('id_sekolah', $sekolah->id_sekolah)->first();
    $tot = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('tahun_ajaran', $ppdb->tahun_ajaran)->where('status', 1)->count();
    // dd($tot);
    if($request->status == 1){
        if($tot < $ppdb->jml_diterima){
            Pendaftaran::where('id_pendaftaran', $request->id)->update([
                'status' => $request->status,
            ]);
            return redirect()->back();
        }else{
            // dd('k');
            return redirect()->back()->with(['warning' => 'Sudah melebihi Batas Jumlah diterima']);
        }
    }else{
        Pendaftaran::where('id_pendaftaran', $request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
}

public function hapus_daftar($id){
    $data = Pendaftaran::findOrFail($id);
    $data->delete();
    return redirect('/data_pendaftaran')->with(['success' => 'Berhasil Hapus Data!']);
}

public function profile_sekolah($sekolah){
    if (!session::get('loginadmin')) {
        return redirect('login');
    }else{
        $id = Session::get('id_user');
        $data = Sekolah::where('id_user', $id)->first();
        $list_kec = Kecamatan::orderBy('nama_kec', 'ASC')->get();
        return view('admin.profile.profile_sekolah', compact('data','list_kec'));
    }
} 

public function update_profile(Request $request){
    $id_sekolah = $request->id_sekolah;
    $data = Sekolah::find($id_sekolah);
        // $data->id_user =$id_user;
    $data->id_kec =$request->id_kec;
    $data->nama_sekolah =$request->nama_sekolah;
    $data->nama_kps =$request->nama_kps;
    $data->tingkat =$request->tingkat;
    $data->email =$request->email;
    $data->radius = $request->radius;
    $data->nohp =$request->nohp;
    $data->alamat =$request->alamat;
    $data->visimisi =$request->visimisi;
    $data->deskripsi =$request->deskripsi;
    
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

    $sekolah = Sekolah::where('id_sekolah', $id_sekolah)->first();
    User::where('id_user', $sekolah->id_user)->update([
        'question' => $request->question,
        'answer' => $request->answer,
    ]);

    return redirect('profile-sekolah/'.str_replace(' ','-', strtolower($request->nama_sekolah)))->with(['success' => 'Berhasil diedit']);
}

public function st_zonasi(Request $request){
    $id = Session::get('id_user');
    // $id_sekolah  = $request->id_sekolah;
    $sekolah = Sekolah::where('id_user', $id)->first();
    $ppdb = Ppdb::where('id_sekolah', $sekolah->id_sekolah)->first();
    $tot_zonasi = $ppdb->daya_tampung / 2;
    // $data = Pendaftaran::where('jalur', 'zonasi')->get();
    // foreach($data as $key => $val){
    //     for($i=0; $i < $tot_zonasi ; $i++){
    //         $datas = Pendaftaran::where('id_pendaftaran', $val->id_pendaftaran)->where('jarak', '<=' , $sekolah->radius)->update([
    //                 'status' => 1
    //             ]);
    //     }
    // }

    // return $tot_zonasi;
    // dd(date('Y-m-d'));
    // if($ppdb->tgl_berakhir <= date('Y-m-d')){
        $pendaftaran = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('jalur', 'zonasi')->get();
        // dd($pendaftaran);
        foreach($pendaftaran as $key => $val){
            if($val->jarak <= $sekolah->radius){
                $data = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('jalur', 'zonasi')->where('jarak', '<=' , $sekolah->radius)->limit($tot_zonasi)->orderBy('jarak', 'ASC')->update([
                    'status' => 1
                ]);
            }else{
                $data = Pendaftaran::where('id_sekolah', $sekolah->id_sekolah)->where('jalur', 'zonasi')->where('jarak', '>' , $sekolah->radius)->update([
                    'status' => 2
                ]);
            }
        }
    // }else{
    //     $data = '';
    // }
    return $data;
}

public function cetak()
{
    $lo = Sekolah::where('id_user',Session::get('id_user'))->first();
    $thn = date('Y') .' / '. date('Y', strtotime('+1 year'));

    $data = Pendaftaran::join('siswa', 'pendaftaran.id_siswa', '=', 'siswa.id_siswa')
    ->where('pendaftaran.id_sekolah', $lo->id_sekolah)->where('pendaftaran.tahun_ajaran', $thn)
    ->select('pendaftaran.*', 'siswa.*')
    ->get();
    // dd($thn);


    $pdf = PDF::loadview('admin.data_daftar.daftar_pdf',['data'=>$data, 'lo' => $lo]);
    return $pdf->stream();
}

public function upload_hasil(Request $request){
    $lo = Sekolah::where('id_user',Session::get('id_user'))->first();
    $data = new Hasilseleksi;
    if($request->hasFile('hasil')){
        $image = $request->file('hasil');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'imageUpload/dokumen';
            $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
            $data['hasil_seleksi'] = $image_name;
        }
    }
    $thn = date('Y');
    $thn_ajar = $thn ." / ". date('Y', strtotime('+1 year'));
    $data['tahun_ajar'] = $thn_ajar;
    $data->id_sekolah = $lo->id_sekolah;
    $data->save();
    return redirect('/data_pendaftaran')->with(['success' => 'Berhasil Upload Data']);
}

public function gantipass(Request $request){
    $id = $request->id_user;
    $user = User::where('id_user',$id)->first();
    $pass = $user->password;

    

    if(\Hash::check($request->curpass, $pass))
    {
        // dd('j');
        // $data = User::find($id);
        
        // $data->password = \Hash::make($request->input('newpass'));
        // $data->save();
        User::where('id_user', $id)->update([
            'password' => \Hash::make($request->input('newpass')),
        ]);
        Session::flush();
        return redirect('/login')->with('success', 'Password berhasil diganti');
    } else {
        // dd('k');
        return back()->with('warning','Password lama anda salah');
    }
    
}

}