<?php

namespace App\Http\Controllers\Travel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LienheController extends Controller
{
    public function index(){
    	return view('travel.lienhe.index');
    }
}
