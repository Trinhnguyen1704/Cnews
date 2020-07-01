<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CatModel; 

class CnewsIndexController extends Controller
{
	public function __construct(CatModel $catModel){
		$this->catModel = $catModel;
	}
    public function index(){
    	return view('cnews.index.index');
    }
    
}
