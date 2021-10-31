<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select("employees.*","companies.CompanyTitle")->join("companies","employees.company_id","=","companies.id")->orderBy('employees.id','DESC')->cursorPaginate(10);
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
        $employee = DB::table('employees')->join('companies','employees.company_id','=','companies.id')->select('employees.*','companies.CompanyTitle')->where('employees.id',base64_decode($id))->first();
        return view('employee.view',['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail(base64_decode($id));
        $companies = Company::orderBy('id','DESC')->get();
        return view('employee.edit',['employee' => $employee,'companies' => $companies]);
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

        $employee = Employee::findOrFail(base64_decode($id));
        $employee->company_id = $validated['CompanyId'];
        $employee->first_name = $validated['employeeFirstName'];
        $employee->last_name = $validated['employeeLastName'];
        $employee->email = $request->employeeEmail;
        $employee->phone = $request->employeeNumber;

        $employee->save();
        session()->flash('update','Record Updated Successfully');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail(base64_decode($id));
        $employee->delete();
        session()->flash('delete','Record Deleted successfully');
        return back();
    }
}
