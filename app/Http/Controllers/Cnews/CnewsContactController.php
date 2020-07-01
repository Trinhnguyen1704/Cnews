<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ContactModel;  // include
use App\Http\Requests\ContactRequest;

class CnewsContactController extends Controller
{
	public function __construct(ContactModel $contactModel){
		$this->contactModel = $contactModel;
	}
    public function index(){
    	return view('cnews.contact.index');
    }

    public function postContact(ContactRequest $request){
    	$name = $request->name;
    	$web = $request->web;
    	$email = $request->email;
    	$content = $request->content;
    	$result  =  $this->contactModel->addContact($name,$web,$email,$content);
    	
    	if(isset($result)){
    		$msg = "Bạn đã gửi liên hệ thành công";
    	}else{
    		$msg = "Liên hệ chưa được gửi";
    	}

    	return view('cnews.contact.index',compact('msg'));
    }

/*
    public function edit($id){
    	$item = $this->storyModel->getItem($id);
    	
    	return view('admin.story.edit', compact('item'));
    }
    */
}

//Câu lệnh JOIN 
