<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\s;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id','DESC')->cursorPaginate(10);
        return view('company.index',['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $EmailData = array();

        $validated = $request->validate([
            'companyTitle' => 'required',
            'company_logo' => 'mimes:jpeg,jpg,png,gif,svg|dimensions:max_width=100,max_height=100'
        ],
            [
                'companyTitle.required' => 'Company Title is required',
                'company_logo.mimes' => 'File type must be an image',
                'company_logo.dimensions' => 'Image dimensions must be 100x100'
            ]);
        if ($request->company_logo)
            $validated['company_logo'] = $request->company_logo->store('images');

        $company = new Company;
        $company->CompanyTitle = $validated['companyTitle'];
        $company->Email = $request->companyEmail;
        $company->CompanyLogo = isset($validated['company_logo']) ? $validated['company_logo'] : "";
        $company->CompanyWebsite = $request->companyWebsite;

        $EmailData = array("CompanyTitle" => $validated['companyTitle']);
        Mail::to($request->companyEmail)->send(new TestMail($EmailData));
        $company->save();
        session()->flash('add','Record Added Successfully');
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail(base64_decode($id));
        return view('company.view',['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail(base64_decode($id));
        return view('company.edit',['company' => $company]);
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
            'companyTitle' => 'required',
            'company_logo' => 'mimes:jpeg,jpg,png,gif,svg|dimensions:max_width=100,max_height=100'
        ],
            [
                'companyTitle.required' => 'Company Title is required',
                'company_logo.mimes' => 'File type must be an image',
                'company_logo.dimensions' => 'Image dimensions must be 100x100'
            ]);
        if ($request->company_logo)
            $validated['company_logo'] = $request->company_logo->store('images');

        $company = Company::findOrFail($id);
        $company->CompanyTitle = $validated['companyTitle'];
        $company->Email = $request->companyEmail;
        $company->CompanyLogo = isset($validated['company_logo']) ? $validated['company_logo'] : "";
        $company->CompanyWebsite = $request->companyWebsite;

        $company->save();
        session()->flash('update','Record Updated Successfully');
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail(base64_decode($id));
        $company->delete();
        session()->flash('delete','Record Deleted successfully');
        return back();
    }
}
