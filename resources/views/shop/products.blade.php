@extends('layouts.main')

@section('title')
<title>Products</title>
@endsection

@section('content')
<div>
    <h1>Products:</h1>
    @foreach($products as $product)
    <div>
        <h2>{{$product['name']}}</h2>
        <p>{{$product['description']}}</p>
        <p>Price: {{$product['price']}}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection
