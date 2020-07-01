<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
         return [
            'username' => ['required','min:6','max:32'],
            'password' => ['required','min:6'],
            
            'fullname'     => 'required'
        ];
    } public function messages()
    {
         return [
            'username.required' => 'Vui lòng nhập tên đăng nhập cập!',
            'username.min'      => 'Tên truy cập ít nhất 6 kí tự!', 
            'username.max'      => 'Tên truy cập nhiều nhất 32 kí tự!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min'      => 'Mật khẩu ít nhất 6 kí tự!', 
            'fullname.required' => 'Vui lòng nhập tên đầy đủ!',
            
        ];
    }
}
