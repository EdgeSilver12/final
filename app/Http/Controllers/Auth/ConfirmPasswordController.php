<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ConfirmPasswordController extends Controller
{
    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

        if (!Auth::guard('web')->validate(['email' => Auth::user()->email, 'password' => $request->password])) {
            throw ValidationException::withMessages(['password' => ['The provided password does not match our records.']]);
        }

        return redirect()->route('user.dashboard');
    }
}
