<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;

class FontPageStudentController extends Controller
{
    public function index($id)
    {
        $attendances = Attendance::where('student_id', $id)->get();
        return view('selfcheck.index', compact('attendances'));
    }
}
