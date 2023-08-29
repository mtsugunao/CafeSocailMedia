<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'post' => 'required|max:140',
            'cafe_id' => 'required|exists:cafes,id',
            'images' => 'array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ];
    }

    public function getPost(): string {
        return $this->input('post');
    }

    public function userId(): int {
        return $this->user()->id;
    }

    public function getCafeId(): int {
        return $this->input('cafe_id');
    }

    public function images(): array {
        return $this->file('images', []);
    }
}
