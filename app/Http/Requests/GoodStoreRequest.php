<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:6|max:80',
            'short_text' => 'required|min:10|max:60',
            'image_path' => 'nullable|mimes:jpg,jpeg,png'
        ];
    }
}
