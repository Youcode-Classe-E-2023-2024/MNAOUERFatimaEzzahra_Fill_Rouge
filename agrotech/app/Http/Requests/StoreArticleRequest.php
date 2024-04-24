<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            'title' => 'required|string|unique:events',
//            'description' => 'required|string|min:10',
//            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
//            'categories' => 'required|integer',
//            'tags' => 'required|integer'
        ];
    }
}
