<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            "student_name"=>'required',
            "student_roll"=>'required',
            "blood_name"=>'required',
            "department_name"=>'required',
            "class_name"=>'required',
            "gender_name"=>'required',
        ];
    }
}
