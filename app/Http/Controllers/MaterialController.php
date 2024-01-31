<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Redirect;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material = Material::join('sizeorder','sizeorder.id','=','materials.size_order_id')->get();
        // return $materialType->toJson();
        return view('master.material_list')->with('materials',$material);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Material =new Material();
        return view('master.material_detail',['material'=>$Material,'mode'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $material =new Material();
        $material->material_name=$request->input('name');
        $material->size_order_id=$request->input('size_order_id');
        $material->save();
        return redirect('/material/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material,$id)
    {
        $material = Material::find($id);
        
        return view('master.material_detail',['material'=>$material,'mode'=>'Edit']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $material = Material::find($request->input('id'));
        $material->material_name=$request->input('name');
        $material->size_order_id=$request->input('size_order_id');
        $material->isactive= ($request->input('status')=='on') ? 1:0;
        $material->save();
        return redirect('/material/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material,$id)
    {
        $material = Material::find($id);
        $material->delete();
        return Redirect::back()->with('status','Removed Successful !');
    }
}
