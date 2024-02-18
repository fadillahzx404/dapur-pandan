<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Products;
use App\Models\CategoryProducts;
use App\Models\PaymentMethods;
use App\Models\Transactions;
use App\Models\User;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $banners = Banners::count();
        $products = Products::count();
        $categories = CategoryProducts::count();
        $payments = PaymentMethods::count();
        $transactions = Transactions::count();
        $users = User::count();

        return view('admin.dashboard', ['products' => $products, 'users' => $users, 'transactions' => $transactions, 'banners' => $banners, 'payments' => $payments, 'categories' => $categories]);
    }
}
