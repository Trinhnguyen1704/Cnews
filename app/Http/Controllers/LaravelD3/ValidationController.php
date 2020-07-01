<?php

namespace App\Http\Controllers\LaravelD3;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidationController extends Controller
{
    public function valid(){
    	return view('lrvd3.valid');
    }
}
