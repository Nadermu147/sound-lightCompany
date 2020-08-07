<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryHandler extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'name' => 'required|min:2|regex:/^[\d\w -]+$/',
             'slug' => 'required|min:2|alpha_dash|unique:categories,slug',
             'image' => 'required|image'
             
        ];
    }
}
