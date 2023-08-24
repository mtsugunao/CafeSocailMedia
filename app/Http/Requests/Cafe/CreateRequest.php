<?php

namespace App\Http\Requests\Cafe;

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
            'cafeName' => 'required',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required',
            'streetAddress' => 'required',
            'postalCode' => 'required|max:6',
            'description' => 'nullable|string',
            'parking' => 'nullable|string',
        ];
    }

    public function cafeName(): string {
        return $this->input('cafeName');
    }

    public function country(): string {
        return $this->input('country');
    }

    public function province(): string {
        return $this->input('province');
    }

    public function city(): string {
        return $this->input('city');
    }

    public function streetAddress(): string {
        return $this->input('streetAddress');
    }

    public function postalCode(): string {
        return $this->input('postalCode');
    }

    public function parking(): string {
        return $this->input('parking');
    }

    public function description(): string {
        return $this->input('description');
    }

}
