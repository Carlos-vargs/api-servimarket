<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {

        $company = Auth::user()->companies()->create($request->validated());

        $company->categories()->attach($request->category_id);

        return CompanyResource::make($company);
    }

    /**
     * Update a company in the database
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {

        $company = Company::findOrFail($id);

        $this->authorize('update', $company);

        $company->update($request->validated());

        $company->categories()->sync($request->category_id);

        return CompanyResource::make($company);
    }

    /**
     * Remove a company from the database.
     * @param  $id
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $this->authorize('delete', $company);

        $company->delete();

    }
}
