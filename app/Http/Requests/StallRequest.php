<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StallRequest extends FormRequest
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
                'name' => ['bail', 'required', 'string', 'max:255'],
                'description' => ['bail', 'required', 'string', 'max:255'],
                'contact' => ['bail', 'nullable', 'string', 'max:255'],
                'position' => ['bail', 'nullable', 'alpha_num'],
                'logo' => ['bail', 'required', 'mimes:jpeg,jpg,png', 'max:20480'],
                'standy' => ['bail', 'required', 'mimes:jpeg,jpg,png', 'max:20480'],
                'stall_image_path' => ['bail', 'nullable', 'mimes:jpeg,jpg,png', 'max:20480'],
                'video_path' => ['bail', 'required', 'mimes:mp4,mpeg,mov,avi', 'max:51200'],
                'images' => ['required', 'array', 'max:2'],
                'images.*' => ['bail', 'mimes:jpeg,jpg,png', 'max:20480'],
            ];
        } elseif ($this->getMethod() === 'PUT') {
            $rules = [
                'name' => ['bail', 'required', 'string', 'max:255'],
                'description' => ['bail', 'required', 'string', 'max:255'],
                'contact' => ['bail', 'nullable', 'string', 'max:255'],
                'position' => ['bail', 'nullable', 'alpha_num'],
                'logo' => ['bail', 'nullable', 'mimes:jpeg,jpg,png', 'max:20480'],
                'standy' => ['bail', 'nullable', 'mimes:jpeg,jpg,png', 'max:20480'],
                'stall_image_path' => ['bail', 'nullable', 'mimes:jpeg,jpg,png', 'max:20480'],
                'video_path' => ['bail', 'nullable', 'mimes:mp4,mpeg,mov,avi', 'max:51200'],
                'images' => ['nullable', 'array', 'max:2'],
                'images.*' => ['bail', 'mimes:jpeg,jpg,png', 'max:20480'],
            ];
        }

        return $rules;
    }
}
