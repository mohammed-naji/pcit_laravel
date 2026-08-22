<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'max:30'],
            'password' => ['required', 'min:6'],
            'age' => ''
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'email.required' => 'الايميل اهم منك',
            'password.required' => 'بدنا الباسسورد ي خفيف',
        ];
    }
}
