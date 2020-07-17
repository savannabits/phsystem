<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" =>["sometimes", "string"],
            "last_name" =>["sometimes", "string"],
            "middle_name" =>["nullable", "string"],
            "gender" =>["nullable", "string"],
            "dob" =>["nullable", "date"]
        ];
    }
}
