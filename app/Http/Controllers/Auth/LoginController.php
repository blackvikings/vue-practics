<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
//        $user = User::where('email', $request->email)->first();
//        if (!$user || !Hash::check('password', $user->password)) {
//            throw ValidationException::withMessages([
//                'email' => ['The provided credentials are incorrect.'],
//                'password' => ['The provided credentials are incorrect.'],
//            ]);
//        }

        if (!auth()->attempt($request->only(['email', 'password']))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

    }
}
