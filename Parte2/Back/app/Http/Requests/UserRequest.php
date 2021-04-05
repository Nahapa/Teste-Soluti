<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'      => 'required|string',
            'cpf'       => 'required|unique:users,cpf,' . $this->user . ',id,deleted_at,NULL',
            'email'     => 'required|email|unique:users,email,' . $this->user . ',id,deleted_at,NULL',
            'phone'     => 'required|unique:users,phone,' . $this->user . ',id,deleted_at,NULL',
            'password'  => ($this->user) ? 'nullable' : 'required'
        ];
    }
}
