@extends('layouts.main')

@section('title')
<title>Products</title>
@endsection

@section('content')
<div>
    @include('partials.info', ['info' => $info ?? ''])
    @if(Auth::user()->is_admin)
    <a href="{{ route('shop.create') }}">Create new product</a>
    @endif
    <h1>Products:</h1>
    @foreach($products as $product)
    <div>
        <h2>{{$product->name}}</h2>
        <p>Price: {{$product->price}}</p>
        <a href="{{ route('shop.product', ['id' => $product->id]) }}">view</a>
        <hr>
    </div>
    @endforeach
</div>
@endsection
