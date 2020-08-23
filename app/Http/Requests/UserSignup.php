<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignup extends FormRequest {

    public function rules() {
        $unique = ($this->user) ? ',' . $this->user : '';
        $required = ($this->user) ? '' : 'required|min:4|';

        return [
            'name' => 'Required|min:2|max:90',
            'email' => 'Required|email|unique:users,email' . $unique,
            'password' => $required . 'confirmed',
            'role' => 'sometimes|integer|exists:roles,id',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least 2 charcters.',
        ];
    }

}
