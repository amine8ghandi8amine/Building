<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
    	# code...
    	return view('admin.home.index');
    }

    public function show()
    {
    	# code...
    	return 'idont want to show this';
    }
}
