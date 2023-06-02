<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
    
        return [
            'vendor_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users') . $this->user()->id],
            'phone_no' => 'required|min:9|max:11',
            // 'year' => 'required',
            'name' => ['required', Rule::unique('users')],
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password|min:8',
            'address' => 'required',
            'vendor_no'=>'required'
        ];
    }
}
