<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSettingsController extends Controller
{
    public function index()
    {
        return view('pages.dashboard-settings');
    }
    public function account()
    {
        return view('pages.dashboard-accounts');
    }
}
