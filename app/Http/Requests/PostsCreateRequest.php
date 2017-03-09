<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsCreateRequest extends Request
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
//            'category_id' =>'required',
//            'title'       =>'required',
//            'body'       =>'required'
        ];
    }
    public function messages(){
        return [
            'category_id.required'=>'類別不可為空白',
            'title.required'=>'標題不可為空白',
            'body.required'=>'內容不可為空白',
        ];
    }
}
