<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class StoryModel extends Model
{
    protected $table  = 'story';
    protected $primaryKey = "story_id";
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	return DB::table('story as s')->join('cat as c','s.cat_id','=','c.cat_id')->orderBy('s.story_id', 'desc')->select('*','s.name as sname', 'c.name as cname')->paginate(4);
    }
    public function getItem($id){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	//return DB::table('users')->where('id',$id)->first();
    	return $this->find($id);
    }
     public function getItemDetail($id,$counter){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        //return DB::table('users')->where('id',$id)->first();
        DB::table('story')->where('story_id',$id)->update(['counter' => $counter]);
        return $this->find($id);
    }
    public function getCat(){
        return DB::table('cat')->get();
    }
     public function getStories(){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        return DB::table('story')->orderBy('story_id','DESC')->paginate(4);
    }
    public function getSameNews($id, $cat_id){
        
            $id_cat = $cat_id;
            $id_story = $id;
            return DB::table('story')->where('cat_id',$id_cat)->where('story_id','<>',$id_story)->limit(2)->get();
        
    }
     public function getItemsEdited($id,$name,$preview,$detail,$picture,$cname,$create){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('story')->where('story_id',$id)->update(['name' => $name,'preview_text' => $preview,'detail_text' => $detail,'picture'=> $picture,'created_at'=> $create]);
       return DB::table('story as s')->join('cat as c','s.cat_id','=','c.cat_id')->orderBy('s.story_id', 'desc')->select('*','s.name as sname', 'c.name as cname')->paginate(4);
    
    }

    public function getIdCat($cname){
      
        return DB::table('cat')->select('cat_id')->where('name',$cname)->get();
    }
    public function getItemsAdded($name,$preview,$detail,$picture,$idCat,$counter,$create){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('story')->insert(['name'=>$name, 'preview_text'  => $preview,'detail_text'=>$detail,'picture'  => $picture,'cat_id'=> $idCat,'counter'  => $counter,'created_at'  => $create]);
         return DB::table('story as s')->join('cat as c','s.cat_id','=','c.cat_id')->orderBy('s.story_id', 'desc')->select('*','s.name as sname', 'c.name as cname')->paginate(4);
    }

     public function getItemsDeleted($id){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('story')->where('story_id',$id)->delete();
         return DB::table('story as s')->join('cat as c','s.cat_id','=','c.cat_id')->orderBy('s.story_id', 'desc')->select('*','s.name as sname', 'c.name as cname')->paginate(4);
    }

    public function getItemsSearch($name,$cname){
        return DB::table('story as s')->join('cat as c','s.cat_id','=','c.cat_id')->select('*','s.name as sname', 'c.name as cname')->where('s.name',$name)->orwhere('c.name',$cname)->orderBy('s.story_id', 'desc')->paginate(4);
    }
};

//nối bảng story
//trong function getItems
// return DB::table('story as s')->join('cat as c', 's.cat_id', 'c.cat_id')->orderBy('s.story_id', 'desc')->paginate(2);
//mở file .env cấu hình >> tạo model>> configure table, prKey, timestamps>> tạo construct >> function>> truyền ra view (cách sử dụng foreach)
//truyền 2 biến [$id, $name], view 2 biến >> controller có 2 biến.
//đặt lại controller >> AdminUserController , AdminStoryController
