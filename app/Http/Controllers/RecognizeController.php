<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;

class RecognizeController extends Controller
{
    public function getFolderName()
    {
        $dirs = public_path('uploads');
        $folderName = scandir($dirs);
        unset($folderName[0]);
        unset($folderName[1]);
        $results = array_values($folderName);

        return $results;
    }

    public function getFileName($folderName)
    {
        $dirs = public_path('uploads/' . $folderName);
        $folderName = scandir($dirs);
        unset($folderName[0]);
        unset($folderName[1]);
        $results = array_values($folderName);

        return $results;
    }

    public function checkAttendance($id)
    {
        $attendance = Attendance::where('student_id', $id)
            ->whereDate('check_in', DB::raw('CURDATE()'))
            ->first();
        if ($attendance !== null) {
            $attendance->check_out = \Carbon\Carbon::now();
            $attendance->update();
            return 'update';
        }

        $newAttendance = new Attendance();
        $newAttendance->student_id = $id;
        $newAttendance->check_in = \Carbon\Carbon::now();
        $newAttendance->save();
        return 'new';
    }
}
