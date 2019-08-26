<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
           'email' => 'required|email',
           'roles' => 'required',
           'status' => 'required',
           

        ];
    }

    public function messages()
    {
       return [
         'name.required' => 'لطفا نام و نام خانوادگی را وارد کنید',
         'email.required' => 'لطفا ایمیل را وارد کنید',
         'email.email' => 'ایمیل شما معتبر نیست',
         'roles.required' => 'حداقل یک نقش را انتخاب  کنید',
         'status.required' => 'لطفا وضعیت کاربر را انتخاب کنید',
         

       ]; 
    }
}
