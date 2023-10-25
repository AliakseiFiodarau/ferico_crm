<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable as DataTable;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DataTable $dataTable
     * @return mixed
     */
    public function index(DataTable $dataTable): View
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
     * @return void
     */
    public function store(Request $request): void
    {
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
     * @return void
     */
    public function update(Request $request, string $id): void
    {
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
