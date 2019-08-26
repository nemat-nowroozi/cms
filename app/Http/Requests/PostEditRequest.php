<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PostEditRequest extends FormRequest
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
           'title' => 'required|min:10',//min gozashtim chon seo behtari dareh
           'slug' => Rule::unique('posts')->ignore(request()->post),
           'description' => 'required',
           'category' => 'required',
           'status' => 'required',

        ];
    }


    public function messages() 
    {
       return [
         'title.required' => 'لطفا عنوان مطلب را وارد کنید',
         'title.min' =>'عنوان مطلب شما باید بیش از 10 کارکتر باشدا',
         'slug.unique' => 'این نام مستعار قبلا ذخیره شده است',
         'description.required' => 'لطفا توضیحات مطلب را وارد کنید',
         
         
         'category.required' => 'لطفا دسته بندی این مطلب  را مشخص کنید',
         'status.required' => ' وضعیت مطلب نا مشخص است',
         


       ]; 
    }

    
}
