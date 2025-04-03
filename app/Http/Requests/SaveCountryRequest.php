<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCountryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'iso3' => ['nullable', 'string', 'max:255'],
            'iso2' => ['nullable', 'string', 'max:255'],
            'numeric_code' => ['nullable', 'integer'],
            'phonecode' => ['nullable', 'string', 'max:255'],
            'capital' => ['nullable', 'string', 'max:255'],
            'currency' => ['nullable', 'string', 'max:255'],
            'currency_name' => ['nullable', 'string', 'max:255'],
            'currency_symbol' => ['nullable', 'string', 'max:255'],
            'tld' => ['nullable', 'string', 'max:255'],
            'native' => ['nullable', 'string', 'max:255'],
            'region' => ['nullable', 'string', 'max:255'],
            'subregion' => ['nullable', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'max:255'],
            'timezones' => ['nullable', 'array'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'emoji' => ['nullable', 'string', 'max:255'],
            'emojiU' => ['nullable', 'string', 'max:255'],
        ];
    }
}
