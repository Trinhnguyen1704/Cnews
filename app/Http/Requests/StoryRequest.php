<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'name'    => 'required',
            'detail'  => 'required',
            'cname'   => 'required'
        ];
    } public function messages()
    {
         return [
            'name.required'   => 'Vui lòng nhập tên truyện!',
            'detail.required' => 'Vui lòng nhập chi tiết!',
            'cname.required'  => 'Chọn danh mục truyện'   
        ];
    }
}
