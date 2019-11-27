<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Mailgun\Mailgun;

class EmailController extends Controller
{
    public function index()
    {
        $students = Student::select('name', 'id', 'email')->get();
        return view('mailgun.index', compact('students'));
    }

    public function sendEmail(Request $request)
    {
        $data = $request->all();
        $student = Student::findOrFail($data['student_id']);
        $mg = Mailgun::create(
            'c389dff39ac01ba2eda27420b2126255-1df6ec32-c8a0b14c'
        );

        $mg->messages()->send('voz.htknguyen.com', [
            'from' => 'postmaster@voz.htknguyen.com',
            'to' => $student['email'],
            'subject' => $data['subject'],
            'html' => $data['content']
        ]);

        $notification = array(
            'title' => 'Sucessful',
            'message' =>
                'Email send to student ' .
                $student['name'] .
                ' has been sent successfully',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('mail.index')
            ->with($notification);
    }
}
