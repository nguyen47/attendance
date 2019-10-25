<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Student;
use File;

class ImageController extends Controller
{
    public function index($id) {
        return view('students.upload', compact('id'));
    }

    public function fileStore(Request $request){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $path = public_path("uploads/$request->studentId");
        // File::makeDirectory($path, $mode = 777, true, true);
        $image->move($path, $imageName);
        
        $imageUpload = new Image();
        $imageUpload->url = $imageName;
        $imageUpload->student_id = $request->studentId;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request){
        $filename =  $request->get('filename');
        $image = Image::where('url',$filename)->first();
        $path=public_path().'/uploads/'."$image->student_id/".$filename;
        if (file_exists($path)) {
            File::delete($path);
        }
        return $filename;  
    }
}
