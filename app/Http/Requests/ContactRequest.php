<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:2000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('site.contact.validation.name_required'),
            'name.max' => __('site.contact.validation.name_max'),
            'email.required' => __('site.contact.validation.email_required'),
            'email.email' => __('site.contact.validation.email_invalid'),
            'subject.required' => __('site.contact.validation.subject_required'),
            'subject.max' => __('site.contact.validation.subject_max'),
            'message.required' => __('site.contact.validation.message_required'),
            'message.min' => __('site.contact.validation.message_min'),
            'message.max' => __('site.contact.validation.message_max'),
        ];
    }
}