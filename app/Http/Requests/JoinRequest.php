<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JoinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Sanitize inputs to prevent XSS
        $this->merge([
            'name' => strip_tags($this->name),
            'father_name' => strip_tags($this->father_name),
            'address' => strip_tags($this->address),
            'aadhar_no' => preg_replace('/[^0-9]/', '', $this->aadhar_no ?? ''),
            'voterid' => strtoupper(strip_tags($this->voterid)),
            'phone_no' => preg_replace('/[^0-9+]/', '', $this->phone_no ?? ''),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Honeypot field - should be empty
            'website' => 'nullable|max:0',

            // Personal Information - Enhanced validation
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s\.]+$/', // Only letters, spaces, and dots
            ],
            'father_name' => 'nullable|string|min:3|max:255|regex:/^[a-zA-Z\s\.]+$/',
            'dob' => 'nullable|date|before:today|after:1940-01-01',
            'gender' => 'nullable|in:Male,Female,Other',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',

            // Contact Information
            'address' => 'nullable|string|max:500',
            'pincode' => 'nullable|digits:6',
            'phone_no' => [
                'required',
                'string',
                'regex:/^[6-9][0-9]{9}$/', // Valid Indian mobile number
                'unique:members,phone_no',
            ],
            'email_id' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:members,email_id',
            ],

            // ID Numbers
            'aadhar_no' => [
                'nullable',
                'digits:12',
                'regex:/^[2-9][0-9]{11}$/', // Valid Aadhar format
                'unique:members,aadhar_no',
            ],
            'voterid' => [
                'nullable',
                'string',
                'max:50',
                'regex:/^[A-Z]{3}[0-9]{7}$/', // Valid Voter ID format
                'unique:members,voterid',
            ],

            // Location Information
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'place_type' => 'nullable|string',
            'block_id' => 'nullable|exists:blocks,id',
            'city_id' => 'nullable|exists:cities,id',
            'perur_id' => 'nullable|exists:perurs,id',
            'corporation_id' => 'nullable|exists:corporations,id',

            // File Uploads - Enhanced security
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048', // 2MB
                'dimensions:min_width=200,min_height=200,max_width=4000,max_height=4000',
            ],

            // Terms
            'terms' => 'required|accepted',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'father_name' => 'Father\'s Name',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'blood_group' => 'Blood Group',
            'address' => 'Address',
            'pincode' => 'Pincode',
            'phone_no' => 'Phone Number',
            'email_id' => 'Email ID',
            'aadhar_no' => 'Aadhar Number',
            'voterid' => 'Voter ID',
            'state_id' => 'State',
            'district_id' => 'District',
            'assembly_id' => 'Assembly',
            'place_type' => 'Place Type',
            'block_id' => 'Block',
            'city_id' => 'City',
            'perur_id' => 'Perur',
            'corporation_id' => 'Corporation',
            'photo' => 'Photo',
            'terms' => 'Terms and Conditions',
        ];
    }
}