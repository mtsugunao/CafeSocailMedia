<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'post' => 'required|max:255'
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

    public function getId(): int {
        return (int) $this->route('postId');
    }
}
