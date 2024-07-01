<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::post("/logout", [
    AuthenticatedSessionController::class,
    "destroy_admin"
])->middleware("auth");

Route::post("/login", [
    AuthenticatedSessionController::class,
    "store_admin"
])->middleware("guest");

Route::post("/login/desktop", [
    AuthenticatedSessionController::class,
    "store_admin_desktop"
]);

Route::middleware("is_admin")->group(function () {
    Route::apiResource("manage", AdminController::class);
    Route::apiResource("brands", BrandController::class);
    Route::apiResource("categories", CategoryController::class);
    Route::apiResource("sucategories", SubcategoryController::class);
    Route::apiResource("products", ProductController::class);
    Route::apiResource("orders", OrderController::class);
    Route::apiResource("users", CustomerController::class);
    Route::post("/brands/update/{brand}", [BrandController::class, "update"]);
    Route::post("/orders/update/{order}", [OrderController::class, "update"]);
});
