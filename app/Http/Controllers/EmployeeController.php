<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\RequestService;
use Illuminate\Contracts\View\View;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\DataTables\EmployeeDataTable as DataTable;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    public function __construct(
        private readonly RequestService $requestService
    ) {}

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
     * @return View
     */
    public function create(): View
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
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        $id = $this->requestService->getEntityId($request);
        $employee = Employee::find($id);
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param EmployeeUpdateRequest $updateRequest
     * @return void
     */
    public function update(Request $request, EmployeeUpdateRequest $updateRequest): void
    {
        $validated = $updateRequest->validated();
        $id = $this->requestService->getEntityId($request);
        $employee = Employee::find($id);
        $employee->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request): void
    {
        $id = $this->requestService->getEntityId($request);
        $employee = Employee::find($id);
        $employee->delete($id);
    }
}
