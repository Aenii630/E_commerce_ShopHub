<?php
namespace App\Http\Controllers;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::latest()->take(8)->get();
        $categories = Product::select('category')->distinct()->get();
        return view('home', compact('featured', 'categories'));
    }
}