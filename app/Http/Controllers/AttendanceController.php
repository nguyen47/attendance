<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Student;
use Redirect, Response;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::select('id', 'name')->get();
        return view('attendances.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $seperateTime = explode(' - ', $request->checkTime);
        $data['check_in'] = $seperateTime[0];
        $data['check_out'] = $seperateTime[1];
        unset($data['checkTime']);
        $attendance = new Attendance();
        $attendance->create($data);

        $notification = array(
            'title' => 'Sucessful',
            'message' =>
                'The attendance ' .
                $attendance['id'] .
                ' has been created sucessfull',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('attendances.index')
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
        $findAttendance = Attendance::findOrFail($id);
        $attendances = Attendance::where(
            'student_id',
            $findAttendance->student_id
        )->get();
        return view(
            'attendances.show',
            compact('attendances', 'findAttendance')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $attendance = Attendance::findOrFail($request->attendance_id);
        $attendance->delete();
        $notification = array(
            'title' => 'Sucessful',
            'message' =>
                'The attendance ' .
                $attendance['id'] .
                ' has been deleted sucessfull',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('attendances.index')
            ->with($notification);
    }
}
