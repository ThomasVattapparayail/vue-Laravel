<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
  
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
            ], 200);

        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password',
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful',
        ], 200);
    }
}
