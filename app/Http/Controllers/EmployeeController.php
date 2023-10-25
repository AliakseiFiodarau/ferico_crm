<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable as DataTable;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DataTable $dataTable
     * @return mixed
     */
    public function index(DataTable $dataTable): mixed
    {
        return $dataTable->render('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return View
     */
    public function create(Company $company): View
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param EmployeeStoreRequest $storeRequest
     * @return void
     */
    public function store(Request $request, EmployeeStoreRequest $storeRequest): void
    {
        $validated = $storeRequest->validated();
        Employee::create($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @param Company $company
     * @return View
     */
    public function edit(Employee $employee, Company $company): View
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @param EmployeeUpdateRequest $updateRequest
     * @return void
     */
    public function update(
        Request               $request,
        string                $id,
        EmployeeUpdateRequest $updateRequest
    ): void
    {
        $validated = $updateRequest->validated();
        $employee = Employee::find($id);
        $employee->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id): void
    {
        $employee = Employee::find($id);
        $employee->delete($id);
    }
}
