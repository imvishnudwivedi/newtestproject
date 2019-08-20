<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VishnuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

		return view('welcome');
	}

	public function home() {

		

		return view('website.index');

    }

   
}
