<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('cart.index');
        return view('checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'phone'   => 'required|string',
        ]);

        $cart  = session()->get('cart', []);
        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total'   => $total,
            'address' => $request->address,
            'phone'   => $request->phone,
            'status'  => 'pending',
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $id,
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
            Product::find($id)?->decrement('stock', $item['quantity']);
        }

        session()->forget('cart');
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) abort(403);
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}