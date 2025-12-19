<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicationRequest extends FormRequest
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
            'mother_name' => strip_tags($this->mother_name),
            'spouse_name' => strip_tags($this->spouse_name),
            'education' => strip_tags($this->education),
            'occupation' => strip_tags($this->occupation),
            'current_post' => strip_tags($this->current_post),
            'address' => strip_tags($this->address),
            'membership_id' => strip_tags($this->membership_id),
            'aadhar_no' => preg_replace('/[^0-9]/', '', $this->aadhar_no ?? ''),
            'voterid_no' => strtoupper(strip_tags($this->voterid_no)),
            'mobile_number' => preg_replace('/[^0-9+]/', '', $this->mobile_number ?? ''),
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
            'mother_name' => 'nullable|string|min:3|max:255|regex:/^[a-zA-Z\s\.]+$/',
            'spouse_name' => 'nullable|string|min:3|max:255|regex:/^[a-zA-Z\s\.]+$/',
            'dob' => 'nullable|date|before:today|after:1940-01-01',
            'gender' => 'nullable|in:Male,Female,Other',
            'education' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'marital_status' => 'nullable|in:Single,Married,Divorced,Widowed',
            'social_category' => 'nullable|in:General,OBC,SC,ST',
            'joining_date' => 'nullable|date|before_or_equal:today|after:1980-01-01',
            'current_post' => 'nullable|string|max:255',

            // Contact Information
            'address' => 'nullable|string|max:500',
            'mobile_number' => [
                'nullable',
                'string',
                'regex:/^[6-9][0-9]{9}$/', // Valid Indian mobile number
            ],
            'email_id' => [
                'nullable',
                'email:rfc,dns',
                'max:255',
            ],

            // ID Numbers
            'membership_id' => 'nullable|string|max:100',
            'aadhar_no' => [
                'nullable',
                'digits:12',
                'regex:/^[2-9][0-9]{11}$/', // Valid Aadhar format
            ],
            'voterid_no' => [
                'nullable',
                'string',
                'max:50',
                'regex:/^[A-Z]{3}[0-9]{7}$/', // Valid Voter ID format
            ],

            // Location Information
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'assembly_id' => 'nullable|exists:assemblies,id',
            'postingstage_id' => 'required|exists:postingstages,id',
            'subbody_id' => 'nullable|exists:subbodies,id',
            'post_id' => 'nullable|exists:posts,id',
            'block_id' => 'nullable|exists:blocks,id',
            'city_id' => 'nullable|exists:cities,id',
            'perur_id' => 'nullable|exists:perurs,id',
            'paguthi_id' => 'nullable|exists:paguthis,id',
            'vattam_id' => 'nullable|exists:vattams,id',
            'corporation_id' => 'nullable|exists:corporations,id',

            // File Uploads - Enhanced security
            'document' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120', // 5MB
                'mimetypes:application/pdf,image/jpeg,image/png',
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048', // 2MB
                'dimensions:min_width=200,min_height=200,max_width=4000,max_height=4000',
            ],
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
            'mother_name' => 'Mother\'s Name',
            'spouse_name' => 'Spouse Name',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'education' => 'Education',
            'occupation' => 'Occupation',
            'marital_status' => 'Marital Status',
            'social_category' => 'Social Category',
            'joining_date' => 'Joining Date',
            'current_post' => 'Current Post',
            'address' => 'Address',
            'mobile_number' => 'Mobile Number',
            'email_id' => 'Email ID',
            'membership_id' => 'Membership ID',
            'aadhar_no' => 'Aadhar Number',
            'voterid_no' => 'Voter ID',
            'state_id' => 'State',
            'district_id' => 'District',
            'assembly_id' => 'Assembly',
            'postingstage_id' => 'Posting Stage',
            'subbody_id' => 'Sub Body',
            'post_id' => 'Post',
            'block_id' => 'Block',
            'city_id' => 'City',
            'perur_id' => 'Perur',
            'paguthi_id' => 'Paguthi',
            'vattam_id' => 'Vattam',
            'corporation_id' => 'Corporation',
            'document' => 'Document',
            'photo' => 'Photo',
        ];
    }
}
