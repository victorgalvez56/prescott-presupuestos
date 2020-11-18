<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        return view('customers.index');
    }
    public function index_logo(Request $request)
    {
        return view('customers.index');
    }
    public function index_planners(Request $request)
    {
        return view('customers.index');
    }
}
