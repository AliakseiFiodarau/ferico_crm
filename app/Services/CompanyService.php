<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyService
{
    /**
     * Store newly created or updte specified company.
     *
     * @param Request $request
     * @param string|null $id
     * @return void
     */
    public function saveCompany(Request $request, ?string $id = null): void
    {
        $company = $id ? Company::find($id) : new Company;
        $company->name = $request->input(Company::COLUMN_NAME);
        $company->phone = $request->input(Company::COLUMN_PHONE);
        $company->email = $request->input(Company::COLUMN_EMAIL);
        $company->url = $request->input(Company::COLUMN_URL);
        if ($request->hasfile(Company::COLUMN_LOGO)) {
            $file = $request->file(Company::COLUMN_LOGO);
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('storage/images/logo', $fileName);
            $company->logo = $fileName;
        }
        $company->save();
    }
}
