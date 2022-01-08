<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVacationRequest extends FormRequest
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
            'employee_id'    => 'required',
            'vacationFrom'   => 'required|before:vacationTo',
            'vacationTo'     => 'required|after:vacationFrom',
            'type'           => 'required',
            'reason'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required'   => "Employee is required",
            'vacationFrom.required'  => "Vacation from is required",
            'vacationFrom.before'    => "Vacation from must be befor vacation to",

            'vacationTo.required'  => "Vacation to is required",
            'vacationTo.before'    => "Vacation to must be after vacation from",
            'type.required'        => "Type is required",
            'reason.required'      => "Reason is required",
        ];
    }
}
