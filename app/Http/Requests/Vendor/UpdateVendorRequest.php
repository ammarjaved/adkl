<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class UpdateVendorRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('users')->ignore($_REQUEST['id'])],
            'phone_no' => 'required|min:9|max:11',
            'ba' => 'required',
            'year' => 'required',
            'erms_amount' => 'required',
            'name' => ['required', Rule::unique('users')->ignore($_REQUEST['id'])],
            'address' => 'required',
        ];
    }
}
