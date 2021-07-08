<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;

class KecamatanController extends Controller
{
	public function index(){
		$list_kec = Kecamatan::all();
		return view('admin.kecamatan.index',compact('list_kec'));
	}

	public function create(){
		return view ('admin.kecamatan.create');
	}

	public function add(Request $request){
		$input = $request->all();
		Kecamatan::create($input);
		return redirect('kecamatan')->with(['success' => 'Berhasil Tambah Data!']);

	}

	public function edit($id)
	{
		$kecamatan = Kecamatan::findOrFail($id);
		return view('admin.kecamatan.edit',compact('kecamatan'));
	}

	public function update($id, Request $request)
	{
		$kecamatan = Kecamatan::findOrFail($id);
		$input = $request->all();
		$kecamatan->update($input);
		return redirect('kecamatan')->with(['success' => 'Berhasil Edit Data!']);
	}

	public function delete($id)
	{
		$kecamatan = Kecamatan::findOrFail($id);
		$kecamatan->delete();
		return redirect('kecamatan')->with(['success' => 'Berhasil Hapus Data!']);
	}
}