<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Session\Store;

class ShopController extends Controller
{
    public function home() {
        $latest_products = Product::orderBy('date_added', 'DESC')->take(3)->get();
        return view('shop.home', [
            'products' => $latest_products]);
    }

    public function products() {
        $products = Product::all();
        return view('shop.products', [
            'products' => $products
        ]);
    }

    public function cart(Store $session) {
        $cart = $session->get('cart');
        $cartProducts= [];
        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            array_push($cartProducts, [
                'id' => $id,
                'name' => $product['name'],
                'quantity' => $quantity
            ]);
        }
        return view('shop.cart', [
            'message' => "got redirected " . print_r($session->get('cart')),
            'cartProducts' => $cartProducts
        ]);
    }

    public function product($id) {
        $product = Product::find($id);
        return view('shop.product', ['product' => $product]);
    }

    public function addToCart(Store $session, Request $request) {
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
        return redirect()->route('shop.cart');
    }
}
