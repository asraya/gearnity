<?php

namespace App\Http\Requests\Mitra;

use Illuminate\Foundation\Http\FormRequest;

class CourseMitraUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'categorie_id' => 'required',
            'type' => 'required',
            'price' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'description' => 'required',
        ];
    }
}
