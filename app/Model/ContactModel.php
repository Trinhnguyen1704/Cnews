<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContactModel extends Model
{
    protected $table  = 'contact';
    protected $primaryKey = "contact_id";
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	return DB::table('contact')->orderBy('contact_id','DESC')->paginate(3);
    }
    public function getItem($id){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	//return DB::table('users')->where('id',$id)->first();
    	return $this->find($id);
    }

    public function addContact($name,$web,$email,$content){
        return DB::table('contact')->insert(['name'=>$name, 'email'  => $email,'website'=>$web,'content'  => $content]);
    }
}

//nối bảng story
//trong function getItems:
// return DB::table('story as s')->join('cat as c', 's.cat_id', 'c.cat_id')->orderBy('s.story_id', 'desc')->paginate(2);
//mở file .env cấu hình >> tạo model>> configure table, prKey, timestamps>> tạo construct >> function>> truyền ra view (cách sử dụng foreach)
//truyền 2 biến [$id, $name], view 2 biến >> controller có 2 biến.
//đặt lại controller >> AdminUserController , AdminStoryController
