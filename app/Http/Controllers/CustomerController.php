<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Redirect;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Customer = Customer::all();
        // return $materialType->toJson();
        return view('master.customer_list')->with('customers',$Customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Customer =new Customer();
        return view('master.customer_detail',['customer'=>$Customer,'mode'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request->all());

        $customer =new Customer();
        $customer->customer_name=$request->input('name');
        $customer->mobile=$request->input('mobile');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->gst_no=$request->input('gst_no');
        $customer->poc_name=$request->input('poc_name');
        $customer->poc_mobile=$request->input('poc_mobile');
        $customer->save();
        return redirect('/customer/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer,$id)
    {
        $customer = Customer::find($id);
        
        return view('master.customer_detail',['customer'=>$customer,'mode'=>'Edit']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // dd($request->all());
        $customer = Customer::find($request->input('id'));
        $customer->customer_name=$request->input('name');
        $customer->mobile=$request->input('mobile');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->gst_no=$request->input('gst_no');
        $customer->poc_name=$request->input('poc_name');
        $customer->poc_mobile=$request->input('poc_mobile');
        $customer->isactive= ($request->input('status')=='on') ? 1:0;
        $customer->save();
        return redirect('/customer/List')->with('status','Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return Redirect::back()->with('status','Removed Successful !');
    }
}
