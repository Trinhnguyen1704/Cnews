<?php

namespace App\Http\Controllers\Cnews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StoryModel;
use App\Model\CatModel;
  // include

class CnewsNewsController extends Controller
{
	public function __construct(CatModel $catModel,StoryModel $storyModel){
		$this->catModel = $catModel;
        $this->storyModel = $storyModel;
	}
	//index
    public function index(){
        
        $story =  $this->storyModel->getStories();
    	return view('cnews.news.index',compact('story'));
    }
    //detail
    public function detail($id,$cat_id,$slugStory){
        $counter = 0;
       
        $item = $this->storyModel->getItem($id);
        
        $counter = $item->counter;
        $counter += 1;
        
        $itemDetail = $this->storyModel->getItemDetail($id, $counter);
        $sameNews = $this->storyModel->getSameNews($id, $cat_id);
    	return view('cnews.news.detail',compact('itemDetail','sameNews'));
    }
    //cat
    public function cat($slug,$id){
        
        $catNews = $this->catModel->getCatNews($id);
        $cname = $slug;
        
    	return view('cnews.news.cat',compact('catNews','cname'));
    } 
}
