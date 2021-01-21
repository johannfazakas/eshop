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
        <p>{{$product['description']}}</p>
        <p>Price: {{$product['price']}}</p>
        <p>Date added: {{$product['date_added']}}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection
