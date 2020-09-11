<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminPagesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
	    return view('admin/' . 'index');
	}
}
