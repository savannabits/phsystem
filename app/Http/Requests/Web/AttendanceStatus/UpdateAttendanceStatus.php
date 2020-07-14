<?php

namespace App\Http\Requests\Web\AttendanceStatus;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAttendanceStatus extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('attendance-status.edit', $this->attendanceStatus);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'code' => ['sometimes', Rule::unique('attendance_statuses', 'code')->ignore($this->attendanceStatus->getKey(), $this->attendanceStatus->getKeyName()), 'string'],
            'name' => ['sometimes', Rule::unique('attendance_statuses', 'name')->ignore($this->attendanceStatus->getKey(), $this->attendanceStatus->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'enabled' => ['nullable', 'boolean'],
            
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
