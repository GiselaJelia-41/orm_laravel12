<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company', 'skills')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.create', compact('companies', 'skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id'
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'company_id' => $request->company_id
        ]);

        if ($request->has('skills')) {
            $employee->skills()->sync($request->skills);
        }

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $skills = Skill::all();
        $employee->load('skills');

        return view('employees.edit', compact('employee', 'companies', 'skills'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id'
        ]);

        $employee->update([
            'name' => $request->name,
            'company_id' => $request->company_id
        ]);

        $employee->skills()->sync($request->skills ?? []);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
