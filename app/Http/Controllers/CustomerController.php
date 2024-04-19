<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::all();
        return view('/employee/customer/dataCustomer', compact('customers'));
    }
}
