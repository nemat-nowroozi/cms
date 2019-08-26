<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
           'slug' =>'unique:posts',
           'description' => 'required',
           'first_photo' => 'required',
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
         
         'first_photo.required' => 'لطفا تصویر اصلی مطلب را مشخص کنید',
         'category.required' => 'لطفا دسته بندی این مطلب  را مشخص کنید',
         'status.required' => ' وضعیت مطلب نا مشخص است',
         


       ]; 
    }




}
