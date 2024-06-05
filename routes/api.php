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

Route::get("/products", [ProductController::class, "indexForCustomers"]);
Route::get("/products/utils/top-weekly-bestseller", [
    ProductController::class,
    "getTop10BestSellerWeeklyProducts"
]);
Route::get("/products/{slug}", [ProductController::class, "showForCustomer"]);
Route::get("/products/{slug}/similar", [
    ProductController::class,
    "showForCustomerSimilar"
]);
Route::get("/products/category/{slug}", [
    ProductController::class,
    "indexForCustomersByCategorySlug"
]);

Route::get("/categories", [CategoryController::class, "indexForCustomers"]);
Route::get("/categories/utils/top-bestseller", [
    CategoryController::class,
    "getTopCategories"
]);
Route::get("/categories/{slug}", [
    CategoryController::class,
    "showForCustomersBySlug"
]);

Route::get("/brands", [BrandController::class, "indexForCustomers"]);
