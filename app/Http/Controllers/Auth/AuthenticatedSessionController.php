<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (!$request->user()->hasVerifiedEmail()) {
            return response()->json(["message" => "email-not-verified"]);
        }

        return response()->json(["message" => "Sesión Iniciada correctamente"]);
    }

    /**
     * Edit profile information
     */
    public function edit(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            "name" => ["required", "string", "max:255"],
            "password" => ["nullable", "confirmed", Password::defaults()]
        ]);

        $user->name = $request->input("name");
        if ($request->has("password")) {
            $user->password = Hash::make($request->input("password"));
        }

        $user->save();

        return response()->json([
            "message" => "Información actualizada correctamente"
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard("customers")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }

    /**
     * Handle an incoming authentication request for admins.
     */
    public function store_admin(LoginRequest $request): Response
    {
        $request->authenticate("admins");

        $request->session()->regenerate();

        return response()->noContent();
    }

    /**
     * Handle an incoming authentication request for admins in desktop applications.
     */
    public function store_admin_desktop(LoginRequest $request)
    {
        $request->authenticate("admins");
        $admin = Admin::where("email", $request->get("email"))->first();
        $admin->tokens()->delete();

        $token = $admin->createToken("unique_admin_auth_token")->plainTextToken;

        return response()->json(["token" => $token]);
    }

    /**
     * Destroy an authenticated session for admin.
     */
    public function destroy_admin(Request $request): Response
    {
        Auth::guard("admins")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
