<?php

namespace App\Http\Controllers;

use App\Models\purchase;
use App\Models\Vendor;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseList=Vendor::all();
        
        return view('transaction.purchase_add')->with('purchase',$purchaseList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendorList=Vendor::all();
        return view('transaction.purchase_details',['mode'=>'add']);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
