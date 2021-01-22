<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Product;
use App\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class AdminController extends Controller {

    public function create()
    {
        return view('admin.create');
    }

    public function update($id)
    {
        $product = Product::find($id);
        return view('admin.update', ['product' => $product]);
    }

    public function delete($id): RedirectResponse
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('shop.products')->with('info', 'Product deleted');
    }

    public function createProduct(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => ['required', 'gt:0'],
            'quantity' => ['required', 'gt:0']
        ]);
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')
        ]);
        $product->save();

        return redirect()->route('shop.products')->with('info', 'Product created');
    }

    public function updateProduct(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => ['required', 'gt:0'],
            'quantity' => ['required', 'gt:0']
        ]);
        $product = Product::find($request->input('id'));
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->save();

        return redirect()->route('shop.products')->with('info', 'Product updated');
    }
}
