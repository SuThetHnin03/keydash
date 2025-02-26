<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function signUp(Request $request)
    {
        function generateRandomCode($prefix = 'KD', $length = 6) {
            do {

                $randomCode = $prefix . str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
            } while (User::where('user_code', $randomCode)->exists());

            return $randomCode;
        }

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirmPassword' => 'same:password'
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'user_code' => generateRandomCode(),
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);
                return redirect()->route('userHome');
    }

    public function signIn(Request $request)
    {
        $validated = $request->validate([
            'email-login' => 'required|email',
            'password-login' => 'required',
        ]);

        if (Auth::attempt(['email' => $validated['email-login'], 'password' => $validated['password-login']])) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'user') {
                return redirect()->route('userHome');
            }

            if (in_array($user->role, ['admin', 'superadmin'])) {
                return redirect()->route('redirectAddLessons');
            }
        }

        return back()->withErrors(['login' => 'Invalid email or password.']);
    }

    public function signOut() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
