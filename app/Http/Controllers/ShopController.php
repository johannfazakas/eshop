<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Session\Store;

class ShopController extends Controller
{
    public function home()
    {
        $latest_products = Product::orderBy('created_at', 'DESC')->take(3)->get();
        return view('shop.home', [
            'products' => $latest_products]);
    }

    public function products(Store $session)
    {
        $products = Product::all();
        return view('shop.products', [
            'products' => $products,
            'info' => $session->get('info', '')
        ]);
    }

    public function cart(Store $session)
    {
        $cart = $session->get('cart', []);
        $cartProducts = [];
        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            array_push($cartProducts, [
                'id' => $id,
                'name' => $product->name,
                'quantity' => $quantity
            ]);
        }
        return view('shop.cart', [
            'cartProducts' => $cartProducts
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        return view('shop.product', ['product' => $product]);
    }

    public function orders()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        return view('shop.orders', ['orders' => $user->orders]);
    }

    public function addToCart(Store $session, Request $request): RedirectResponse
    {
        $this->validate($request, [
            'id' => 'required',
            'quantity' => ['required', 'gt:0']
        ]);

        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $cart = $session->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id] = $cart[$id] + $quantity;
        } else {
            $cart[$id] = $quantity;
        }
        $session->put('cart', $cart);
        array_push($cart, ['id' => $request->input('id'), 'quantity' => $request->input('quantity')]);

        return redirect()->route('shop.cart')->with('info', 'Added to Card');
    }

    public function placeOrder(Store $session): RedirectResponse
    {
        $cart = $session->get('cart', []);
        $totalPrice = 0.0;
        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            $product->quantity = $product->quantity - $quantity;
            $product->save();
            $totalPrice = $totalPrice + $quantity * $product->price;
        }
        // TODO johann change hardcoded user id
        $userId = Auth::id();
        $user = User::find($userId);
        $order = new Order([
            'total_price' => $totalPrice,
            'user_id' => $user->id
        ]);
        $order->save();
        $session->put('cart', []);

        return redirect()->route('shop.products')->with('info', 'Order added');
    }

}
