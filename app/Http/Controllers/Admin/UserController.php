<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Model\UserModel;  // include

class UserController extends Controller
{
	public function __construct(UserModel $userModel){
		$this->userModel = $userModel;
	}
    public function index(){
    	$items = $this->userModel->getItems();
    	
    	return view('admin.friend.index', compact('items'));
    }

    public function getEdit($id,$slugUser){
    	$item = $this->userModel->getItem($id);
    	
    	return view('admin.friend.edit', compact('item'));
    }
    public function postEdit(UserRequest $request,$id,$slugUser){
        $username= $request->username;
        $fullname= $request->fullname;
        $password= $request->password;
        $items = $this->userModel->getItemsEdited($id,$fullname,$username,$password);
        
        return redirect()->route('admin.user.index');
    }

     public function delete($id){
        
        $items = $this->userModel->getItemsDeleted($id);
        
        return view('admin.friend.index', compact('items'));
    }
    public function getAdd(){
        return view('admin.friend.add');
    }
    public function postAdd(UserRequest $request){
        $t = 0;
        $msg = '';
       
        $username= $request->username;
        $fullname= $request->fullname;
        $password= $request->password;
        $users = $this->userModel->getItems();
        foreach ($users as $user) {
            if($username == $user->username){
                $t = 1;
                $msg = 'Tên đăng nhập đã tồn tại, hãy đặt tên khác !';
                return view('admin.friend.add',compact('msg'));
                break;
            }
        }
        if($t==0){
            $items = $this->userModel->getItemsAdded($fullname,$username,$password); 
            return redirect()->route('admin.user.index');
        }
    }

}

//Câu lệnh JOIN 
