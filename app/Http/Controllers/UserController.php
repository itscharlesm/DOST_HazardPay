<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }
    
    public function login(Request $request)
{
    $incomingFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ], [
        'email.required' => 'Email is required',
        'password.required' => 'Password is required'
    ]);

    if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
        $request->session()->regenerate();

        // Retrieve the authenticated user
        $user = auth()->user();

        // Store the username in the session
        session(['username' => $user->name]);

        return redirect('/dashboard');
    }

    return redirect('/')->withErrors([
        'message' => "Invalid credentials. Please check your email and password.",
    ]);
}
    
    public function logout(){
        Auth::logout();
        return redirect('/');
        
    }
}

// To add user type in terminal php artisan serve
// User::create([
//'name' => 'Kylle',
//'email' => 'k@k.com,
//'password' => bcrypt('1')
//]);

