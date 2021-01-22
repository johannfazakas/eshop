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

    @if(Auth::user()->is_admin)
        <a href="{{ route('shop.update', ['id' => $product->id]) }}">Update product</a>
        <a href="{{ route('shop.delete', ['id' => $product->id]) }}">Delete product</a>
    @else
        <form action="{{ route('shop.addToCart') }}" method="POST">
            @csrf
            <label>Quantity: </label><input type="number" name="quantity">
            <input type="hidden" name="id" value="{{$product->id}}">
            <button type="submit">add to cart</button>
        </form>
    @endif
</div>
@endsection
