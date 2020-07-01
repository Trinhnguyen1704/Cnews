<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserModel extends Model
{
    protected $table  = 'users';
    protected $primaryKey = "id";
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	return DB::table('users')->orderBy('id','DESC')->paginate(4);
    }
    public function getItem($id){
    	//return $this->all();
    	//SELECT * FROM users
    	//return $this->orderBy('id','DESC')->paginate(2);
    	//return DB::table('users')->where('id',$id)->first();
    	return $this->find($id);
    }
    public function getItemsEdited($id,$fullname,$username,$password){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('users')->where('id',$id)->update(['fullname' => $fullname,'username' => $username,'password' => $password]);
        return DB::table('users')->orderBy('id','DESC')->paginate(4);
    }
    public function getItemsDeleted($id){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('users')->where('id',$id)->delete();
        return DB::table('users')->orderBy('id','DESC')->paginate(4);
    }
     public function getItemsAdded($fullname,$username,$password){
        //return $this->all();
        //SELECT * FROM users
        //return $this->orderBy('id','DESC')->paginate(2);
        DB::table('users')->insert(['username'=>$username, 'fullname'  => $fullname,'password'=>$password]);
        return DB::table('users')->orderBy('id','DESC')->paginate(4);
    }

}
//Thêm route chay
//nối bảng story
//trong function getItems:
// return DB::table('story as s')->join('cat as c', 's.cat_id', 'c.cat_id')->orderBy('s.story_id', 'desc')->paginate(2);
//mở file .env cấu hình >> tạo model>> configure table, prKey, timestamps>> tạo construct >> function>> truyền ra view (cách sử dụng foreach)
//truyền 2 biến [$id, $name], view 2 biến >> controller có 2 biến.
//đặt lại controller >> AdminUserController , AdminStoryController
