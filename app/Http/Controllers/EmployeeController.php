<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $employees = Employee::orderBy('id','DESC')->cursorPaginate(10);
        $employees = Employee::select("employees.first_name","employees.last_name","employees.email","employees.phone","companies.CompanyTitle")->join("companies","employees.company_id","=","companies.id")->orderBy('employees.id','DESC')->cursorPaginate(10);
        return $employees;


        return view('employee.index',['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('id','DESC')->get();
        return view('employee.create',['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employeeFirstName' => 'required',
            'employeeLastName' => 'required',
            'CompanyId' => 'required'
        ],
            [
                'employeeFirstName.required' => 'Employee First Name is required',
                'employeeLastName.required' => 'Employee Last Name is required',
                'CompanyId.required' => 'Company is required',
            ]);

        $employee = new Employee;
        $employee->company_id = $validated['CompanyId'];
        $employee->first_name = $validated['employeeFirstName'];
        $employee->last_name = $validated['employeeLastName'];
        $employee->email = $request->employeeEmail;
        $employee->phone = $request->employeeNumber;
        $employee->save();
        session()->flash('add','Record Added Successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
