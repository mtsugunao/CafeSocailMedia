<?php

namespace App\Http\Requests\Cafe;

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
            'cafeName' => 'required|string|max:50',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required|string|max:30',
            'streetAddress' => 'required|string|max:50',
            'postalCode' => 'required|max:7',
            'description' => 'nullable|string|max:511',
            'parking' => 'nullable|string|max:255',
            'menu_name.*' => 'required',
            'menu_price.*' => 'required|numeric|max:1000',
            'wifi' => 'nullable|string|max:10',
            'outlet' => 'nullable|string|max:10',
        ];
    }

    public function id(): int {
        return (int) $this->route('cafeId');
    }
    public function userId(): int {
        return $this->user()->id;
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

    public function parking(): ?string {
        return $this->input('parking');
    }

    public function description(): ?string {
        return $this->input('description');
    }

    public function menu(): array {
        return $this->input('menu_name', []);
    }

    public function price(): array {
        return $this->input('menu_price', []);
    }

    public function menuIds(): array {
        return $this->input('menu_ids', []);
    }

    public function wifi(): string {
        return $this->input('wifi');
    }

    public function outlet(): string {
        return $this->input('outlet');
    }
}
