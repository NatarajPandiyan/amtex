<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;
use Redirect;
class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $process = Process::all();
        // return $materialType->toJson();
        return view('master.process_list')->with('processes',$process);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Process =new Process();
        return view('master.process_detail',['process'=>$Process,'mode'=>'add']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $process =new Process();
        $process->process_name=$request->input('name');
        $process->order=$request->input('order');
        $process->save();
        return redirect('/process/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Process $process,$id)
    {
        $process = Process::find($id);
        
        return view('master.process_detail',['process'=>$process,'mode'=>'Edit']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Process $process)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Process $process)
    {
        $process = Process::find($request->input('id'));
        $process->process_name=$request->input('name');
        $process->order=$request->input('order');
        $process->isactive= ($request->input('status')=='on') ? 1:0;
        $process->save();
        return redirect('/process/List')->with('status', 'Data Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Process $process,$id)
    {
        $process = Process::find($id);
        $process->delete();
        return Redirect::back()->with('status','Removed Successful !');
    }
}
