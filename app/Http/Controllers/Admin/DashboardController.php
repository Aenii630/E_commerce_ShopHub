<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'orders'   => Order::count(),
            'users'    => User::where('role', 'user')->count(),
            'revenue'  => Order::where('status', 'delivered')->sum('total'),
        ];
        $recent_orders = Order::with('user')->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recent_orders'));
    }
}