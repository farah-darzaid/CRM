<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::query();
        $route = url(Request::path()) . '/create';

        $employees = $employees->latest()->paginate(10);

        return view('employee.index', compact('employees', 'route'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('employee.create', compact('companies'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        $employee = $request->validated();

        Employee::create($employee);

        $request->session()->flash('success', trans('content.added_successfully'));
        return redirect()->route("employees.index");
    }

    public function show(Employee $employee)
    {
        $employee = Employee::findOrfail($employee->id);
        $companies = Company::all();

        return $this->edit($employee, $companies);
    }

    public function edit($employee, $companies)
    {
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeStoreRequest $request, $id)
    {
        $origin_employee = Employee::findOrfail($id);
        $employee = $request->validated();

        Employee::updateOrCreate([
            'id' => $origin_employee->id,
        ], [
            'first_name' => $employee['first_name'],
            'last_name' => $employee['last_name'],
            'company_id' => $employee['company_id'],
            'email' => $employee['email'],
            'phone' => $employee['phone'],
        ]);

        $request->session()->flash('success', trans('content.updated_successfully'));
        return redirect()->route("employees.index");
    }

    public function destroy(Employee $employee)
    {
        $employee = Employee::findOrfail($employee->id);
        $employee->delete();

        session()->flash('success', trans('content.deleted_successfully'));
        return redirect()->route("employees.index");
    }
}
