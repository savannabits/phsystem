<?php

namespace App\Http\Requests\Web\Child;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreChild extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('child.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'middle_names' => ['nullable', 'string'],
            'last_name' => ['required', 'string'],
            'bio' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'school' => ['nullable', 'string'],
            'hobbies' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'active' => ['required', 'boolean'],
            'enrollment_date' => ['required', 'date'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
