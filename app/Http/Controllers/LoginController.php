<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
   

    public function check(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return redirect()->route('admin.login')->withErrors(['message' => 'Unauthorized']);
        }

        $user = User::where('email', $request['email'])->where('user_type_id', '3')->firstOrFail();
        if(!$user){
            return redirect()->route('admin.login')->withErrors(['message' => 'Unauthorized']);
        }else{
            session_start();
            return redirect()->route('events.index');
        }
    
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function logout( )
    {
        Auth::logout();
        session_start();
        session_destroy();
        return redirect()->route('admin.login');
    }

    public function show(){
        Auth::logout();
        session_start();
        session_destroy();
        return redirect()->route('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Login successful',
                'user' => Auth::user(),
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
