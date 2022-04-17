<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query();
        $route = url(Request::path()) . '/create';
        $companies = $companies->latest()->paginate(10);

        return view('company.index', compact('companies', 'route'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = $request->validated();
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $company_logo = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/storage/companies/logo/', $company_logo);
            $company['logo'] = $company_logo;
        }

        Company::create($company);

        $request->session()->flash('success', trans('content.added_successfully'));
        return redirect()->route("companies.index");
    }

    public function show(Company $company)
    {
        $company = Company::findOrfail($company->id);

        return $this->edit($company);
    }

    public function edit($company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(CompanyStoreRequest $request, $id)
    {
        $origin_company = Company::findOrfail($id);
        $company = $request->validated();

        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $company_logo = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/storage/companies/logo/', $company_logo);
            $company['logo'] = $company_logo;
        }elseif ($origin_company->logo) {
            $company['logo'] = $origin_company->logo;
        }

        Company::updateOrCreate([
            'id' => $origin_company->id,
        ], [
            'name' => $company['name'],
            'email' => $company['email'],
            'logo' => $company['logo'],
            'website' => $company['website'],
        ]);

        $request->session()->flash('success', trans('content.updated_successfully'));
        return redirect()->route("companies.index");
    }

    public function destroy(Company $company)
    {
        $company = Company::findOrfail($company->id);
        $company->delete();

        session()->flash('success', trans('content.deleted_successfully'));
        return redirect()->route("companies.index");
    }
}
