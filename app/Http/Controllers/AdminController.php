<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function create(AdminRequest $request)
    {
        $admin = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "data" => $admin,
            "message" => "Admin creado exitosamente"
        ]);
    }

    public function edit(Admin $admin)
    {
        return response()->json($admin);
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $admin->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json($admin);
    }

    public function delete(Admin $admin)
    {
        $admin->delete();

        return response()->json([
            "message" => "Admin eliminado correctamente"
        ]);
    }
}