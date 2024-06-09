<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermsController extends Controller
{
    public function show()
    {
        return view('terms');
    }

    public function accept(Request $request)
    {
        $user = Auth::user();
        $user->terms_accepted = true;
        $user->save();

        return redirect()->route('dashboard');
    }
    public function declineTerms(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

}

