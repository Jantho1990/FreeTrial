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

        // We are obfuscating the purpose of this endpoint by
        // returning whether the user exists, rather than whether
        // the submission succeeded. Hopefully this will deter
        // some potential bad actors.
        return User::where('email', $data['email'])->count() > 0
            ? [ 'response' => true ]
            : [ 'response' => false ];
    }
}
