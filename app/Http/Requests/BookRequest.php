<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'images' => 'nullable|string',
            'small_image' => 'nullable|string',
            'publication_date' => 'required|string|max:255',
            'author_id' => 'required|integer|max:255',
            'price' => 'required|string|max:255',
            'quantity_available' => 'required|integer|max:255',
        ];
    }
}
