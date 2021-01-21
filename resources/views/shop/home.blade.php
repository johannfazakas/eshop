@extends('layouts.main')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div>
    <h1>Latest 3 products:</h1>
    <hr>
    @foreach($products as $product)
    <div>
        <h2>{{$product['name']}}</h2>
        <p>Price: {{$product['price']}}</p>
        <p>Date added: {{$product['date_added']}}</p>
        <a href="{{ route('shop.product', ['id' => $product->id]) }}">view</a>
        <hr>
    </div>
    @endforeach
</div>
@endsection
