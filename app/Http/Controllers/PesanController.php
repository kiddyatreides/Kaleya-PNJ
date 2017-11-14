<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesanController extends Controller
{
    public function index()
    {
    	return view('frontend.pesan');
    }

    public function create(request $request)
    {
    	return $request->all();
    }
}
