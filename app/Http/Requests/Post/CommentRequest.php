<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required|max:255'
        ];
    }

    public function postId(): int {
        return (int) $this->route('postId');
    }

    public function userId(): int {
        return $this->user()->id;
    }

    public function getComment(): string {
        return $this->input('comment');
    }
}
