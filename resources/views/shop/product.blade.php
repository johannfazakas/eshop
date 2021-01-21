@extends('layouts.main')

@section('title')
<title>Product</title>
@endsection

@section('content')
<div>
    <h2>{{$product['name']}}</h2>
    <p>Description: {{$product['description']}}</p>
    <p>Price: {{$product['price']}}</p>
    <p>Retail Price: {{$product['retail_price']}}</p>
    <p>Quantity: {{$product['quantity']}}</p>
    <p>Date Added: {{$product['date_added']}}</p>
</div>
@endsection
