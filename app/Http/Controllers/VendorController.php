<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Redirect;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Vendor = Vendor::all();
        // return $materialType->toJson();
        return view('master.vendor_list')->with('vendors',$Vendor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Vendor =new Vendor();
        return view('master.vendor_detail',['vendor'=>$Vendor,'mode'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vendor =new Vendor();
        $vendor->vendor_name=$request->input('name');
        $vendor->mobile=$request->input('mobile');
        $vendor->email=$request->input('email');
        $vendor->address=$request->input('address');
        $vendor->gst_no=$request->input('gst_no');
        $vendor->poc_name=$request->input('poc_name');
        $vendor->poc_mobile=$request->input('poc_mobile');
        $vendor->save();
        return redirect('/vendor/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor,$id)
    {
        $vendor = Vendor::find($id);
        
        return view('master.vendor_detail',['vendor'=>$vendor,'mode'=>'Edit']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor = Vendor::find($request->input('id'));
        $vendor->vendor_name=$request->input('name');
        $vendor->mobile=$request->input('mobile');
        $vendor->email=$request->input('email');
        $vendor->address=$request->input('address');
        $vendor->gst_no=$request->input('gst_no');
        $vendor->poc_name=$request->input('poc_name');
        $vendor->poc_mobile=$request->input('poc_mobile');
        $vendor->isactive= ($request->input('status')=='on') ? 1:0;
        $vendor->save();
        return redirect('/vendor/List')->with('status','Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor,$id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return Redirect::back()->with('status','Removed Successful !');
    }
}
