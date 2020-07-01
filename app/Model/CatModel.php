<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class CatModel extends Model
{
    protected $table  = 'cat';
    protected $primaryKey = "cat_id";
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	return DB::table('cat')->orderBy('cat_id','DESC')->paginate(4);
    }
   
    public function getItems_leftbar(){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
       return $this->all();
    }
    public function getCatNews($id){
        
        return DB::table('story')->where('cat_id',$id)->orderBy('story_id','DESC')->paginate(4);
    }
    public function getItem($id){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        //return DB::table('users')->where('id',$id)->first();
        return $this->find($id);
    }
     public function getItemsEdited($id,$cname){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('cat')->where('cat_id',$id)->update(['name' => $cname]);
        return DB::table('cat')->orderBy('cat_id','DESC')->paginate(4);
    }
    public function getItemsAdded($name){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('cat')->insert(['name'=>$name]);
         return DB::table('cat')->orderBy('cat_id','DESC')->paginate(4);
    }
     public function getItemsDeleted($id){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('cat')->where('cat_id',$id)->delete();
       return DB::table('cat')->orderBy('cat_id','DESC')->paginate(4);
    }

}

//nối bảng story
//trong function getItems:
// return DB::table('story as s')->join('cat as c', 's.cat_id', 'c.cat_id')->orderBy('s.story_id', 'desc')->paginate(2);
//mở file .env cấu hình >> tạo model>> configure table, prKey, timestamps>> tạo construct >> function>> truyền ra view (cách sử dụng foreach)
//truyền 2 biến [$id, $name], view 2 biến >> controller có 2 biến.
//đặt lại controller >> AdminUserController , AdminStoryController
