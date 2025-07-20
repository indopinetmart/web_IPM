<?php

namespace App\Http\Controllers\Pinetmart\Customer;

use App\Http\Controllers\Controller;
use App\Models\Costumner\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'Registered successfully']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (! $customer || ! Hash::check($request->password, $customer->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah'],
            ]);
        }

        $token = $customer->createToken('customer_token')->plainTextToken;

        return response()->json([
            'user'  => $customer,
            'token' => $token,
        ]);
    }

    public function profile(Request $request)
    {
        return response()->json(auth('guest')->user());
    }

    public function logout(Request $request)
    {
        $request->user('guest')->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
