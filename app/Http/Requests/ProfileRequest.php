<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
            'nickname' => ['required', 'string', 'max:20',Rule::unique('users')->ignore(Auth::user()->id)],
            'firstname' => ['required', 'alpha', 'max:25'],
            'lastname' => ['required', 'alpha', 'max:35'],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phonenumber' => ['required', 'numeric'],
            // 'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers(), 'confirmed'],
            'city' => ['required','alpha'],
            'street' => ['required','string'],
            'number' => ['required','numeric'],       
        ];
    }
}
