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
        $company->name = $request->input('name');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->url = $request->input('url');
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('storage/images/logo', $fileName);
            $company->logo = $fileName;
        }
        $company->save();
    }
}
