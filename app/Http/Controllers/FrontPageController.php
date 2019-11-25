<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;
use DataTables;

class FrontPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Attendance::whereDate('check_in', DB::raw('CURDATE()'))
                ->orderBy('check_in', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('student_name', function (Attendance $attendance) {
                    return $attendance->students->name;
                })
                ->make(true);
        }

        return view('welcome');
    }
}
