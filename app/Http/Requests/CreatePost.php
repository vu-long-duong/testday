<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'title' => 'required|unique:posts|max:255',
        'content' => 'required',
        'imagepost' =>'mimes:jpg,bmp,png',
        ];
    }
    public function messages()
    {
        return [
            'title.unique' => 'Tên tiêu đề đã tồn tại',
            'title.required' => 'Tên tiêu đề không được bỏ trống',
            'content.required' => 'Phần nội dung không được bỏ trống',
            'imagepost' => 'Hình ảnh không đúng định dạng',
        ];
    }
}
