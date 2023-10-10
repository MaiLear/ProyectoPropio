<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->isMethod('post')){
            return [
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ];
        }

        if($this->isMethod('put')){
            return[
                'first_name' => ['string'],
                'second_name' => ['string'],
                'email' => ['email'],
                'password' => ['min:8'] 
            ];
        }
    }
}
