<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function showForCustomer()
    {
        return Address::where("user_id", auth()->id())->get();
    }
}