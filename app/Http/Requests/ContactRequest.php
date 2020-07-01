<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email'     => 'email:dns',
            'content'     => 'required'
        ];
    } public function messages()
    {
         return [
            'name.required' => 'Vui lòng nhập tên!',
           
            'content.required' => 'Vui lòng nhập nội dung!',
            'email.email'       =>  "Bạn phải nhập đúng định dạng email!",
           
        ];
    }
}
