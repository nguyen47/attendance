<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Major;
use Redirect,Response;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::all();
        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $majors = new Major();
        $data = $request->all();
        $majors->create($data);

        $notification = array(
            'title' => 'Successful',
            'message' => 'The major ' . $data['name'] . ' has been created successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('majors.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::findOrFail($id);
        return view('majors.edit', compact('major'));
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
        $major = Major::findOrFail($id);
        $data = $request->all();
        $major->update($data);
        $notification = array(
            'title' => 'Successful',
            'message' => 'The major ' . $data['name'] . ' has been updated successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('majors.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $major = Major::where('id',$id)->delete();
        return Response::json($major);
    }
}
