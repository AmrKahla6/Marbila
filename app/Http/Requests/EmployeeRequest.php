<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'         => 'required|max:50|min:3',
            'email'        => 'required|unique:users,email',
            'address'      => 'required',
            'jobTitle'     => 'required',
            'mobile'       => 'required|unique:users,mobile',
            'dateOfBirth'  => 'required|date|before:-18 years|before:hireDate|date_format:Y-m-d',
            'hireDate'     => 'required|date_format:Y-m-d|after:dateOfBirth',
            'profileImage' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => "Employee Name is required",
            'name.max'              => "Employee max name is 50 Letter",
            'name.max'              => "Employee min name is 3 Letter",

            'email.required'        => "Employee email is required",
            'email.unique'          => "Employee email is exist",

            'address.required'      => "Employee address is required",

            'jobTitle.required'     => "Employee job title is required",

            'mobile.required'       => "Employee mobile is required",

            'dateOfBirth.required'  => "Employee date of birth is required",
            'dateOfBirth.before'    => "Employee  must be bigger than 18 years old",

            'hireDate.required'     => "Employee hire date is required",
            'hireDate.after'        => "Employee hire date must after birthday",

            'profileImage.nullable' => "Employee profile image is not required",
        ];
    }
}
