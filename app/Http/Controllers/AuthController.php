<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('dashboard.index');
        } else {
            Auth::guard('student')->attempt($credentials);
            $id = Auth::guard('student')->user()->id;
            return redirect()->route('FontPageStudentController.index', $id);
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('login');
    }

    public function studentLogout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('frontPage.index');
    }
}
