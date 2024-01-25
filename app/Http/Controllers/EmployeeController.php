<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Redirect;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Employee = Employee::all();
        // return $materialType->toJson();
        return view('master.employee_list')->with('employees',$Employee);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Employee =new Employee();
        return view('master.employee_detail',['employee'=>$Employee,'mode'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee =new Employee();
        $employee->employee_name=$request->input('name');
        $employee->mobile=$request->input('mobile');
        $employee->email=$request->input('email');
        $employee->address=$request->input('address');
        $employee->dob=$request->input('dob');
        $employee->designation=$request->input('designation');
        $employee->save();
        return redirect('/employee/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee,$id)
    {
        $employee = Employee::find($id);
        
        return view('master.employee_detail',['employee'=>$employee,'mode'=>'Edit']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee = Employee::find($request->input('id'));
        $employee->employee_name=$request->input('name');
        $employee->mobile=$request->input('mobile');
        $employee->email=$request->input('email');
        $employee->address=$request->input('address');
        $employee->dob=$request->input('dob');
        $employee->designation=$request->input('designation');
        $employee->isactive= ($request->input('status')=='on') ? 1:0;
        $employee->save();
        return redirect('/employee/List')->with('status','Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee,$id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return Redirect::back()->with('status','Removed Successful !');
    }
}
