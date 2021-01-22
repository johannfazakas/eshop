@extends('layouts.main')

@section('title')
<title>Orders</title>
@endsection

@section('content')
<div>
    <h1>Orders:</h1>
    @foreach($orders as $order)
    <div>
        <p>Date: {{$order->created_at}}</p>
        <p>Total price: {{$order->total_price}}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection
