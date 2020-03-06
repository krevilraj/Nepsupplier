<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this Request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the Request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'first_name' => 'required|string|max:255',
	        'last_name'  => 'required|string|max:255',
	        'email'      => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
	        'phone'      => 'numeric|min:10',
	        'avatar'      => 'image',
        ];
    }
}
