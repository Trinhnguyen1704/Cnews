<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ContactModel;  // include

class ContactController extends Controller
{
	public function __construct(ContactModel $contactModel){
		$this->contactModel = $contactModel;
	}
    public function index(){
    	$items = $this->contactModel->getItems();
    	
    	return view('admin.contact.index', compact('items'));
    }
/*
    public function edit($id){
    	$item = $this->storyModel->getItem($id);
    	
    	return view('admin.story.edit', compact('item'));
    }
    */
}

//Câu lệnh JOIN 
