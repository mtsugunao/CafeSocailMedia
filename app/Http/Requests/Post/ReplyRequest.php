<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
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
            'reply' => 'required|max:255'
        ];
    }
    public function getReply(): string {
        return $this->input('reply');
    }
    public function getCommentId(): int {
        return (int) $this->route('commentId');
    }
    public function getPostId(): int {
        return (int) $this->route('postId');
    }

    public function userId(): int {
        return $this->user()->id;
    }
}
