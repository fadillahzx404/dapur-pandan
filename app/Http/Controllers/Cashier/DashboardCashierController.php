<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cashier.dashboard');
    }
}
