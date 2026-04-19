<?php
namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::when(request('category'), fn($q) =>
            $q->where('category', request('category'))
        )->when(request('search'), fn($q) =>
            $q->where('name', 'like', '%'.request('search').'%')
        )->paginate(12);
        $categories = Product::select('category')->distinct()->get();
        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $related = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)->take(4)->get();
        return view('products.show', compact('product', 'related'));
    }
}