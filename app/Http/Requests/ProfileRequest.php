<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'nickname' => ['required', 'unique:users', 'string', 'max:20'],
            'firstname' => ['required', 'alpha', 'max:25'],
            'lastname' => ['required', 'alpha', 'max:35'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'phonenumber' => ['required', 'numeric'],
            // 'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers(), 'confirmed'],
            'city' => ['required','alpha'],
            'street' => ['required','string'],
            'number' => ['required','numeric'],       
        ];
    }
}
