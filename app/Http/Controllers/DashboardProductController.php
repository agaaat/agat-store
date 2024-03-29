<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        return view('pages.dashboard-products');
    }
    public function create()
    {
        return view('pages.dashboard-products-create');
    }

    public function detail()
    {
        return view('pages.dashboard-products-details');
    }
}
