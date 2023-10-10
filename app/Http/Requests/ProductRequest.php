<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NotNumbers;


class ProductRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => ['string', 'required'],
                'brand' => ['required', 'string'],
                'unit_price' => ['required', 'numeric'],
                'stock' => ['required', 'numeric'],
                'category' => ['required'],
                'img'  => ['required', 'image', 'max:200']
            ];
        }

        if($this->isMethod('put')){
            return [
                'name' => [new NotNumbers],
                'unit_price' => ['numeric'],
                'stock' => ['numeric'],
                'category' => ['string'],
                'img'=> ['image']
            ];
        }
    }
}
