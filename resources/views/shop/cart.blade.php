@extends('layouts.main')

@section('title')
<title>Cart</title>
@endsection

@section('content')
<div>
    <h1>Products in cart:</h1>
    <hr>
    @foreach($cartProducts as $product)
    <div>
        <h2>{{$product->name}}</h2>
        <p>Quantity: {{$product->quantity}}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection
