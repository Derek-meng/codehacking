<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactBlog extends FormRequest
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
            //
            'name' => 'required',
            'email'=>'required|email',
            'title' => 'required',
            'body' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'姓名不可為空白',
            'title.required'=>'標題不可為空白',
            'body.required'=>'內容不可為空白',
            'email.required'=>'email不可為空白',
            'email.email'=>'您輸入email,不符合 e-mail 格式',
        ];
    }
}
