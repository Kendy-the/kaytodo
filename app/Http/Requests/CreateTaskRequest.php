<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'name' => ['required','string', 'min:3'],
            'description' => ['required', 'string', 'min:10'],
            'end_at' => ['required',Rule::date()->todayOrAfter()],
            'category' => [
                'required','integer',
                Rule::exists('categories', 'id')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                })
            ],
            'contacts' => ['array', 
                'nullable', Rule::exists('contacts', 'id')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            })],
            'project' => ['nullable',
                'integer', Rule::exists('contacts', 'id')->where(function ($query) {
                return $query->where('user_id', auth()->id());
            })],
        ];
    }
}