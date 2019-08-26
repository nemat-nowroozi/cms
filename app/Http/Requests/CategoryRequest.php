<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
           'title' => 'required',//min gozashtim chon seo behtari dareh
           'slug' => Rule::unique('categories')->ignore(request()->category),
          
        ];
    }





    public function messages() 
    {
       return [
         'title.required' => 'لطفا عنوان مطلب را وارد کنید',
         
         'slug.unique' => 'این نام مستعار قبلا ذخیره شده است',
        
       ]; 
    }



}
