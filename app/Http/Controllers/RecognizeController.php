<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
