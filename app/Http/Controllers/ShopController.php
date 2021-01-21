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

    public function cart() {
        return view('shop.cart');
    }

    public function product($id) {
        $product = Product::find($id);
        return view('shop.product', ['product' => $product]);
    }
}
