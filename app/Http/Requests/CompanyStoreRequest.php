<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;

class CompanyStoreRequest extends FormRequest
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
            Company::COLUMN_NAME => 'required',
            Company::COLUMN_PHONE => 'required|numeric',
            Company::COLUMN_EMAIL => 'required|email|unique:companies',
            Company::COLUMN_URL => 'required|url',
            Company::COLUMN_LOGO => 'file'
        ];
    }
}
