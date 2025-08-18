<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
  
    public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'], // <-- AÑADIDO
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],

        // --- REGLAS PERSONALIZADAS ---
        'career' => ['nullable', 'string', 'max:255'],
        'university' => ['nullable', 'string', 'max:255'],
        'about_me' => ['nullable', 'string'],
        'phone' => ['nullable', 'string', 'max:20'],
        'github_url' => ['nullable', 'url', 'max:255'],
        'linkedin_url' => ['nullable', 'url', 'max:255'],
    ];
}
    
}
