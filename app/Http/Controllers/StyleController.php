<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;
use Redirect;
class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Style::all();
        // return $materialType->toJson();
        return view('master.model_list')->with('models',$model);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model =new Style();
        return view('master.model_detail',['model'=>$model,'mode'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model =new Style();
        $model->model_name=$request->input('name');
        $model->wastage_per=$request->input('wastage_per');
        $model->wgt_per_pcs=$request->input('wgt_per_pcs');
        $model->length_per_pcs=$request->input('length_per_pcs');
        $model->save();
        return redirect('/model/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Style $style,$id)
    {
        $model = Style::find($id);
        // dd($materialType);
        return view('master.model_detail',['model'=>$model,'mode'=>'Edit']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Style $style)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Style $style)
    {
        $model = Style::find($request->input('id'));
        $model->model_name=$request->input('name');
        $model->wastage_per=$request->input('wastage_per');
        $model->wgt_per_pcs=$request->input('wgt_per_pcs');
        $model->length_per_pcs=$request->input('length_per_pcs');
        $model->isactive= ($request->input('status')=='on') ? 1:0;
        $model->save();
        return redirect('/model/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Style $style,$id)
    {
        $model = Style::find($id);
        $model->delete();
        return Redirect::back()->with('status','Operation Successful !');
    }
}
