<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getDashboardData()
    {
        $productIncome = DB::table("order_products")
            ->join("products", "order_products.product_id", "=", "products.id")
            ->select(
                DB::raw(
                    "products.name as product, SUM(order_products.unit_amount * order_products.quantity) as income"
                )
            )
            ->groupBy("products.name")
            ->limit(5)
            ->orderBy(DB::raw("income"), "desc")
            ->get();

        $productSales = DB::table("order_products")
            ->join("products", "order_products.product_id", "=", "products.id")
            ->select(
                DB::raw(
                    "products.name as product, SUM(order_products.quantity) as sales"
                )
            )
            ->groupBy("products.name")
            ->orderBy(DB::raw("sales"), "desc")
            ->limit(5)
            ->get();

        $productPopularity = DB::table("order_products")
            ->join("products", "order_products.product_id", "=", "products.id")
            ->select(
                DB::raw(
                    "products.name as product, COUNT(order_products.product_id) as orders"
                )
            )
            ->groupBy("products.name")
            ->orderBy(DB::raw("orders"), "desc")
            ->limit(5)
            ->get();

        $dailySales = DB::table("orders")
            ->join(
                "order_products",
                "orders.id",
                "=",
                "order_products.order_id"
            )
            ->select(
                DB::raw(
                    "DATE(orders.created_at) as date, SUM(order_products.unit_amount * order_products.quantity) as income"
                )
            )
            ->groupBy(DB::raw("DATE(orders.created_at)"))
            ->get();

        $monthlySales = DB::table("orders")
            ->join(
                "order_products",
                "orders.id",
                "=",
                "order_products.order_id"
            )
            ->select(
                DB::raw(
                    'DATE_FORMAT(orders.created_at, "%Y-%m") as month, SUM(order_products.unit_amount * order_products.quantity) as monthly_sales'
                )
            )
            ->groupBy(DB::raw('DATE_FORMAT(orders.created_at, "%Y-%m")'))
            ->limit(5)
            ->get();

        $ordersByStatus = DB::table("orders")
            ->select(DB::raw("status, COUNT(id) as order_count"))
            ->groupBy("status")
            ->get();

        return [
            "product_income" => $productIncome,
            "product_sales" => $productSales,
            "product_popularity" => $productPopularity,
            "daily_sales" => $dailySales,
            "monthly_sales" => $monthlySales,
            "orders_by_status" => $ordersByStatus
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Admin::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        return Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($admin)
    {
        return Admin::find($admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return $admin;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($admin)
    {
        $admin = Admin::find($admin);
        $admin->delete();
        return $admin;
    }
}
