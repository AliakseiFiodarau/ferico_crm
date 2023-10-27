<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\RequestService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Company;
use App\DataTables\CompanyDataTable as DataTable;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    public function __construct(
        private readonly CompanyService $companyService,
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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CompanyStoreRequest $storeRequest
     * @return void
     */
    public function store(Request $request, CompanyStoreRequest $storeRequest): void
    {
        $validated = $storeRequest->validated();
        $this->companyService->saveCompany($request);
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
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CompanyUpdateRequest $updateRequest
     * @return void
     */
    public function update(Request $request, CompanyUpdateRequest $updateRequest): void
    {
        $validated = $updateRequest->validated();
        $id = $this->requestService->getEntityId($request);
        $this->companyService->saveCompany($request, $id);
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
        $company = Company::find($id);
        $company->delete($id);
    }
}
