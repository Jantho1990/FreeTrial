<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FreeTrialController extends Controller
{
    /**
     * Show the free trial page.
     */
    public function show()
    {
        return view('pages.free-trial');
    }

    /**
     * API Endpoint to check if user email exists in our DB.
     */
    public function verifyUserExists(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email'
        ]);

        return $data;
        // return User::where('email', $request->email);
    }
}
