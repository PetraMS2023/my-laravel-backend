<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function signup(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|unique:admins,name',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);

        $admin = Admin::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return response()->json([
            'message' => 'Admin created',
            'admin'   => $admin,
        ], 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('name', $data['name'])->first();

        if (! $admin || ! Hash::check($data['password'], $admin->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // 🔥 هون التوكن الصح (شكل 1|asdfasdf)
        $token = $admin->createToken('admin-api')->plainTextToken;

        return response()->json([
            'message' => 'Logged in',
            'token'   => $token,
            'admin'   => $admin,
        ]);
    }
}
