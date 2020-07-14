<?php

namespace App\Http\Requests\Web\Child;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateChild extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('child.edit', $this->child);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['sometimes', 'string'],
            'middle_names' => ['nullable', 'string'],
            'last_name' => ['sometimes', 'string'],
            'bio' => ['sometimes', 'string'],
            'gender' => ['sometimes', 'string'],
            'dob' => ['sometimes', 'date'],
            'school' => ['nullable', 'string'],
            'hobbies' => ['nullable', 'array'],
            'location' => ['nullable', 'string'],
            'active' => ['sometimes', 'boolean'],
            'enrollment_date' => ['sometimes', 'date'],
            'relatives'         => ["nullable", "array"],
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
