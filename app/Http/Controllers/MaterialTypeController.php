<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use Illuminate\Http\Request;

class MaterialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.material_type_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialType $materialType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialType $materialType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaterialType $materialType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialType $materialType)
    {
        //
    }
}
