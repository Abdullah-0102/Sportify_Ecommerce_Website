@extends('layouts.boiler_plate')
@section('css')
  <link href="{{ asset('css/deleteProds.css') }}" rel="stylesheet">

  <style>
    .admin-panel {
        background-color: #343a40; 
        color: white;
        padding: 20px;
        height: 100vh;
    }

    .admin-panel h3 {
        font-size: 1.5em; 
        margin-bottom: 20px; 
        text-align: center;
    }

    .admin-panel ul {
        list-style: none; 
        padding: 0;
    }

    .admin-panel li {
        background-color: #555; 
        margin-bottom: 10px; 
    }

    .admin-panel a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .admin-panel a:hover {
        background-color: #777; 
    }


    .centered-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .centered-content img {
      max-width: 100%;
      height: 50%;
    }

    .page-title {
      font-size: 40px;
      font-weight: bold;
      margin: 0;
    }
  </style>
@endsection

@section('content')

  <!-- Admin Panel on the left -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 admin-panel">
            <h3>DASHBOARD</h3>
            <ul>
            <li><a href="#">Add Product</a></li>
            <li><a href="{{ route('delprods') }}">Delete Product</a></li>
            <li><a href="#">Edit Product</a></li>
            <li><a href="#">View inventory</a></li>
            <li><a href="#">Client Orders</a></li>
            </ul>
        </div>

            <!-- Centered Image and Text on the right -->
        <div class="col-md-9 centered-content">
            <div class="page-title">SPORTIFY WEAR</div>
            <div class="page-subtitle">ADMIN PANEL DASHBOARD</div>
            <img src="{{ asset('assets/grey-logo.png') }}" alt="Sportify Wear Image">
        </div>
    </div>
</div>

      
@endsection


