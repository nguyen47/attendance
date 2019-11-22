<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Major;
use Redirect, Response;
use File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();
        return view('students.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:students',
            'fin' => 'required|max:255|unique:students',
            'password' => 'required|confirmed|min:6'
        ]);

        $student = new Student();
        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($request->password);
        $student->create($data);

        $notification = array(
            'title' => 'Sucessful',
            'message' =>
                'The student ' . $data['name'] . ' has been created sucessfull',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('students.index')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();
        return view('students.show', compact('student', 'majors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $majors = Major::all();
        return view('students.edit', compact('student', 'majors'));
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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:students,email,' . $id,
            'fin' => 'required|max:255|unique:students,fin,' . $id,
            'password' => 'required|confirmed|min:6'
        ]);

        $student = Student::findOrFail($id);
        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($request->password);
        $student->update($data);

        $notification = array(
            'title' => 'Sucessful',
            'message' =>
                'The student ' . $data['name'] . ' has been updated sucessfull',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('students.index')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', $id);
        $path = public_path() . '/uploads/' . "$id";
        File::deleteDirectory($path);
        $student->delete();
        return Response::json($student);
    }
}
