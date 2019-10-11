<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id) {
        return view('students.upload', compact('id'));
    }
}
