<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::all();
        return view('/petugas/customer/dataCustomer', compact('customers'));
    }
}
