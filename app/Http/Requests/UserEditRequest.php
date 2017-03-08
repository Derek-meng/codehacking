<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
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
            'name'=>'required',
            'email'=>'required',
            'role_id'=>'required',
            'is_active'=>'required',
            //
        ];
    }
    public function messages(){
        return [
            'name.required'=>'姓名不可為空白',
            'email.required'=>'email不可為空白',
            'role_id.required'=>'Role不可為空白',
            'is_active.required'=>'Status不可為空白',
        ];
    }
}
