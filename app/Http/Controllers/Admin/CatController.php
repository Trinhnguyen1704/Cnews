<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CatModel; 
use App\Http\Requests\CatRequest; // include

class CatController extends Controller
{
	public function __construct(CatModel $catModel){
		$this->catModel = $catModel;
	}
    public function index(){
    	$items = $this->catModel->getItems();
    	
    	return view('admin.cat.index', compact('items'));
    }
/*
    public function edit($id){
    	$item = $this->storyModel->getItem($id);
    	
    	return view('admin.story.edit', compact('item'));
    }
    */
    public function getEdit($id,$slugCat){
        $item = $this->catModel->getItem($id);
        
        return view('admin.cat.edit', compact('item'));
    }
    public function postEdit(CatRequest $request,$id,$slugCat){
        $cname= $request->cname;
        
        $items = $this->catModel->getItemsEdited($id,$cname);
        
         return redirect()->route('admin.cat.index');
    }
     public function getAdd(){
        return view('admin.cat.add');
    }
    public function postAdd(CatRequest $request){
        $t = 0;
        $msg = '';
       
        $name= $request->cname;
        
        $cats = $this->catModel->getItems();
        foreach ($cats as $cat) {
            if($name == $cat->name){
                $t = 1;
                $msg = 'Tên danh mục đã tồn tại, hãy đặt tên khác !';
                return view('admin.cat.add',compact('msg'));
                break;
            }
        }
        if($t==0){
            $items = $this->catModel->getItemsAdded($name); 
            return redirect()->route('admin.cat.index');
        }
    }

     public function delete($id){
        
        $items = $this->catModel->getItemsDeleted($id);
        
        return view('admin.cat.index', compact('items'));
    }
}

//Câu lệnh JOIN 
