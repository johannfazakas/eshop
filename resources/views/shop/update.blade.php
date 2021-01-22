@extends('layouts.main')

@section('title')
<title>Product</title>
@endsection

@section('content')
<div>
    @include('partials.errors')
    <form action="{{ route('shop.updateProduct') }}" method="post">
        @csrf
        Product name: <input type="text" name="name" value="{{ $product->name }}"><br>
        Description: <input type="text" name="description" value="{{ $product->description }}"><br>
        Price: <input type="number" step="0.01" name="price" value="{{ $product->price }}"><br>
        Quantity: <input type="quantity" name="quantity" value="{{ $product->quantity }}"><br>
        <input type="hidden" name="id" value="{{ $product->id }}"/>
        <input type="submit" name="submit" value="Update">
    </form>
</div>
@endsection
