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
        $materialType = MaterialType::all();
        // return $materialType->toJson();
        return view('master.material_type_list')->with('materialTypes',$materialType);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.material_type_detail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $materialType =new MaterialType();
        $materialType->material_name=$request->input('name');
        $materialType->width=$request->input('width');
        $materialType->dimension=$request->input('diamention');
        $materialType->thickness=$request->input('thickness');
        $materialType->save();
        return redirect('/MaterialType/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialType $materialType,$id)
    {
        // dd($id);
        $materialType = MaterialType::find($id);
        // dd($materialType);
        return view('master.material_type_detail')->with('materialType',$materialType);
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
      //  dd($request->all());
        $materialType = MaterialType::find($request->input('id'));
        $materialType->material_name=$request->input('name');
        $materialType->width=$request->input('width');
        $materialType->dimension=$request->input('diamention');
        $materialType->thickness=$request->input('thickness');
        $materialType->isactive= ($request->input('status')=='on') ? 1:0;
        $materialType->save();
        return redirect('/MaterialType/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialType $materialType,$id)
    {
        $materialType = MaterialType::find($id);
        $materialType->delete();
        return redirect('/MaterialType/List')->with('status', 'Data Added Successfully!');
    }
}
