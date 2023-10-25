<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Employee::COLUMN_FIRST_NAME => 'required|alpha',
            Employee::COLUMN_LAST_NAME => 'required|alpha',
            Employee::COLUMN_COMPANY_ID =>'required|exists:companies,id',
            Employee::COLUMN_EMAIL =>'required|email|unique:employees',
            Employee::COLUMN_PHONE =>'required|numeric',
        ];
    }
}
