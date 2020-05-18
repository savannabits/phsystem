<?php

namespace App\Http\Requests\Web\PhClass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePhClass extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('ph-class.edit', $this->phClass);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'slug' => ['sometimes', Rule::unique('ph_classes', 'slug')->ignore($this->phClass->getKey(), $this->phClass->getKeyName()), 'string'],
            'name' => ['sometimes', 'string'],
            'minimum_age' => ['sometimes', 'integer'],
            'maximum_age' => ['sometimes', 'integer'],
            'description' => ['sometimes', 'string'],
            'enabled' => ['sometimes', 'boolean'],
            
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
