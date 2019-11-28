<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;
use App\Student;
use App\Major;

class DashboardController extends Controller
{
    public function index()
    {
        $todayAttendance = Attendance::whereDate(
            'check_in',
            DB::raw('CURDATE()')
        )
            ->get()
            ->count();
        $totalAttendance = Attendance::all()->count();
        $students = Student::all()->count();
        $majors = Major::all()->count();
        return view(
            'dashboard.index',
            compact('todayAttendance', 'totalAttendance', 'students', 'majors')
        );
    }
}
