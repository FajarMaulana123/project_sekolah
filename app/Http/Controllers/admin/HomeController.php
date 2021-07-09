<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
	public function index(){
		if(!Session::get('loginsuper') && !Session::get('loginadmin')){
			return redirect('/login');
		} else {
		return view('admin.index');
	    }
	}
}