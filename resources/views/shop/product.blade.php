@extends('layouts.main')

@section('title')
<title>Product</title>
@endsection

@section('content')
<div>
    @include('partials.errors')
    <h2>{{$product->name}}</h2>
    <p>Description: {{$product->description}}</p>
    <p>Price: {{$product->price}}</p>
    <p>Quantity: {{$product->quantity}}</p>
    <p>Date Added: {{$product->created_at}}</p>
    <form action="{{ route('shop.addToCart') }}" method="POST">
        @csrf
        <label>Quantity: </label><input type="number" name="quantity">
        <input type="hidden" name="id" value="{{$product->id}}">
        <button type="submit">add to cart</button>
    </form>
    <a href="{{ route('shop.update', ['id' => $product->id]) }}">Update product</a>
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                document.getElementById('delete-product-form').submit();">Delete product</a>
    <form id="delete-product-form" action="{{ route('shop.deleteProduct', ['id' => $product->id]) }}" method="POST">
        @csrf
    </form>
</div>
@endsection
