@extends('layouts.boiler_plate')
@section('content')

@php
$cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
@endphp

@if(count($cartItems) > 0)
        <ul>
            @foreach($cartItems as $item)
                <li>
                    <strong>Product Name:</strong> {{ $item['name'] }}<br>
                    <strong>Price:</strong> {{ $item['price'] }}<br>
                    <!-- Display other item details as needed -->
                </li>
            @endforeach
        </ul>
@else
    <p>No items in the cart.</p>
@endif

@endsection