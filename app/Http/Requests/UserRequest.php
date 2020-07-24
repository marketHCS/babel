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
     * Get the validation rules that apply to the req
     * @return array
     */
    public function rules()
    {
        return [
        'name' => ['required', 'max:255'],
        'ap' => ['required', 'max:255'],
        'am' => ['required', 'max:255'],
        'birthdate',
        'rfc' => 'max:17',
        'sex_id' =>['numeric', 'between:1,3'],
        'phone' => 'numeric'
      ];
    }
}
