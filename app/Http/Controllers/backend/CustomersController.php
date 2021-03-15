<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Model\Customer;

class CustomersController extends Controller
{
    public function view(){
     // $customers = Customer::latest()->get();
    	return view('customer');
    }
}
