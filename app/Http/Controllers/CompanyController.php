<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Company;
use App\DataTables\CompanyDataTable as DataTable;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DataTable $dataTable
     * @return mixed
     */
    public function index(DataTable $dataTable): mixed
    {
        return $dataTable->render('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        $company = new Company;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function update(Request $request, string $id): void
    {
        $company = Company::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id): void
    {
        $company = Company::find($id);
        $company->delete($id);
    }
}
