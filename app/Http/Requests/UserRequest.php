<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

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
        $rules = [];

        if ($this->getMethod() === 'POST') {
            $rules = [
                'firstname' => ['required','string','max:255'],
                'lastname' => ['required','string','max:255'],
                'username' => ['required','string','max:255','unique:users,username'],
                'password' => ['required','confirmed',Rules\Password::defaults()],
            ];
        } elseif ($this->getMethod() === 'PUT') {
            $rules = [
                'firstname' => ['required','string','max:255'],
                'lastname' => ['required','string','max:255'],
                'username' => ['required','string','max:255',Rule::unique('users', 'username')->ignore($this->user),],
                'password' => ['required','confirmed',Rules\Password::defaults()],
            ];
        }
        
        return $rules;
    }
}
