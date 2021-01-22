@extends('layouts.main')

@section('title')
<title>Product</title>
@endsection

@section('content')
<div>
    @include('partials.errors')
    <form action="{{ route('admin.createProduct') }}" method="post">
        @csrf
        Product name: <input type="text" name="name"><br>
        Description: <input type="text" name="description"><br>
        Price: <input type="number" step="0.01" name="price"><br>
        Quantity: <input type="quantity" name="quantity"><br>
        <input type="submit" name="submit" value="Create">
    </form>
</div>
@endsection
