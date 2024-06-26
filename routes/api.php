<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MercadoPagoWebhookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum"])->group(function () {
    Route::middleware("verified")->get("/user", function () {
        $auth = auth();

        if ($auth->guard("customers")->check()) {
            return $auth->user();
        }

        return response()->noContent(status: 401);
    });

    Route::get("/admin", function () {
        $auth = auth();

        if (
            $auth->guard("admins")->check() ||
            $auth->guard("admins_desktop")->check()
        ) {
            return $auth->user();
        }

        return response()->noContent(status: 401);
    });

    Route::middleware("is_customer")->group(function () {
        Route::get("/orders", [OrderController::class, "showForCustomer"]);

        Route::post("/orders/store", [
            OrderController::class,
            "storeForCustomer"
        ]);

        Route::get("/addresses", [AddressController::class, "showForCustomer"]);
    });
});
// PUBLIC API

Route::post("/webhook/mercadopago", [
    MercadoPagoWebhookController::class,
    "handle"
])->name("mercado_pago.webhook");

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
Route::get("/products/search/{search}", [
    ProductController::class,
    "searchForCustomer"
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