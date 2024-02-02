<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::where('transaction_status','success')->sum('total_price');
        $transactions = Transaction::count();

        return view('pages.admin.dashboard',[
            'customer' => $customer,
            'transactions' => $transactions,
            'revenue' => $revenue
        ]);
    }
}
