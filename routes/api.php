<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum"])->group(function () {
    Route::get("/user", function () {
        $auth = auth();

        if ($auth->guard("customers")->check()) {
            return $auth->user();
        }

        return response()->noContent(status: 404);
    });
    Route::get("/admin", function () {
        $auth = auth();

        if ($auth->guard("admins")->check()) {
            return $auth->user();
        }

        return response()->noContent(status: 401);
    });

    Route::prefix("admin")
        ->middleware("is_admin")
        ->group(function () {
            Route::apiResource("manage", AdminController::class);
            Route::apiResource("brands", BrandController::class);
        });
});

Route::middleware("guest")->group(function () {
    Route::get("/products", [ProductController::class, "showForCustomers"]);
    Route::get("/categories", [CategoryController::class, "index"]);
    Route::get("/brands", [BrandController::class, "index"]);
});
