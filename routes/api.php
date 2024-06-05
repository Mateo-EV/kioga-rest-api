<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get("/products", [ProductController::class, "indexForCustomers"])->name(
    "guest.products"
);
Route::get("/products/utils/top-weekly-bestseller", [
    ProductController::class,
    "getTop10BestSellerWeeklyProducts"
])->name("guest.products.utils.top-weekly-bestseller");
Route::get("/products/{slug}", [
    ProductController::class,
    "showForCustomer"
])->name("guest.products.slug");
Route::get("/products/{slug}/similar", [
    ProductController::class,
    "showForCustomerSimilar"
])->name("guest.products.slug.similar");
Route::get("/products/category/{slug}", [
    ProductController::class,
    "indexForCustomersByCategorySlug"
])->name("guest.products.category.slug");

Route::get("/categories", [
    CategoryController::class,
    "indexForCustomers"
])->name("guest.categories");
Route::get("/categories/utils/top-bestseller", [
    CategoryController::class,
    "getTopCategories"
])->name("guest.categories.utils.top-bestseller");
Route::get("/categories/{slug}", [
    CategoryController::class,
    "showForCustomersBySlug"
])->name("guest.categories.slug");

Route::get("/brands", [BrandController::class, "indexForCustomers"])->name(
    "guests.brands"
);
