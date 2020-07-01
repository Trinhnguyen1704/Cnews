<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoryRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StoryModel;  // include
use Illuminate\Support\Facades\Storage;
use App\Model\CatModel;

class StoryController extends Controller
{
	public function __construct(StoryModel $storyModel,CatModel $catModel){
		$this->storyModel = $storyModel;
        $this->catModel = $catModel;
	}
    public function index(){
    	$items = $this->storyModel->getItems();
    	$cat   = $this->catModel->getItems_leftbar();
    	return view('admin.story.index', compact('items','cat'));
    }

    public function getEdit($id,$slugName){
    	$item = $this->storyModel->getItem($id);
    	$cat = $this->storyModel->getCat();
    	return view('admin.story.edit', compact('item','cat'));
    }
     public function postEdit(StoryRequest $request,$id,$slugName){
        $item = $this->storyModel->getItem($id);
        $oldPicture = $item->picture;

        $name= $request->name;
        $preview= $request->preview;
        $detail= $request->detail;
        $cname = $request->cname;
        $create = $request->created_at;
        $picture  = $request->picture;
        //echo $picture;
        if($picture != null){
        $tmp = $request->file('picture')->store('public/story');

        //echo $tmp;
        $tmp = explode('/', $tmp);
        $picture = end($tmp);
         if(is_uploaded_file($picture)){
            //Xóa ảnh cũ
             $path  = 'storage/app/public/story/{$oldPicture}';;
             unlink($path);
             $request->session()->put('msg1', 'Upload thành công!');
            
        }else{
            $picture = $oldPicture ;
        }
        
        $items = $this->storyModel->getItemsEdited($id,$name,$preview,$detail,$picture,$cname,$create);  
    }
     return redirect()->route('admin.story.index');
}
public function getAdd(){
        $cat = $this->storyModel->getCat();
        return view('admin.story.add', compact('cat'));
    }
    public function postAdd(StoryRequest $request){
        $name= $request->name;
        $preview= $request->preview;
        $detail= $request->detail;
        $cname = $request->cname;
        $create = $request->created_at;
        $counter = $request->counter;
        $picture  = $request->picture;
        //echo $picture;
        $catItem = $this->storyModel->getIdCat($cname);
        foreach ($catItem as $item) {
            $idCat = $item->cat_id;
        }
        
        if($picture != null){
        $tmp = $request->file('picture')->store('public/story');

        //echo $tmp;
        $tmp = explode('/', $tmp);
        $picture = end($tmp);
         if(is_uploaded_file($picture)){
             $request->session()->put('msg1', 'Upload thành công!');
            
        }
        
        $items = $this->storyModel->getItemsAdded($name,$preview,$detail,$picture,$idCat,$counter,$create);
        }
        return redirect()->route('admin.story.index');
    }

     public function delete($id){
        $item = $this->storyModel->getItem($id);
        $picture = $item->picture;
        $path  = 'storage/app/public/story/'.$picture;
        unlink($path);
        $items = $this->storyModel->getItemsDeleted($id);
        
         return redirect()->route('admin.story.index');
        }

    public function search(Request $request){
        
        $cat   = $this->catModel->getItems_leftbar();
        $name= $request->name;
        $name =  mb_strtoupper($name);
        $cname= $request->cname;
        $resultSearch = $this->storyModel->getItemsSearch($name, $cname);
        
         return view('admin.story.resultSearch', compact('resultSearch','cat'));
     }
       
    public function resultSearch($resultSearch,$cat){
        return view('admin.story.resultSearch', compact('resultSearch','cat'));
    }
    
}

//Câu lệnh JOIN 
//Xoa anh Storage::delete('file.jpg');
