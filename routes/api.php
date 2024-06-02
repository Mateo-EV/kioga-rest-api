<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum"])->get("/user", function (Request $request) {
    $user = $request->user();

    if ($user instanceof \App\Models\User) {
        return $user;
    }

    return response()->json(["message" => "Unauthorized"], 401);
});

Route::middleware(["auth:sanctum"])->get("/admin", function (Request $request) {
    $admin = $request->user();

    if ($admin instanceof \App\Models\Admin) {
        return $admin;
    }

    return response()->json(["message" => "Unauthorized"], 401);
});

Route::get("/admin/{admin}", [AdminController::class, "edit"]);