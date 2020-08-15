<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductHandler extends FormRequest {

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
  
    public function rules() {
          $unique   = ( $this->product ) ? ',' . $this->product : ''; 
          $required = ( $this->product ) ?  '' : 'required|';
        return [
            'name' => 'required|min:2|regex:/^[\d\w -]+$/',
            'slug' => 'required|min:2|alpha_dash|unique:products,slug'.   $unique,
            'image' => $required . 'image',
            'category' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|min:6'
        ];
    }

}
 