@extends('layouts.boiler_plate')
@section('content')

<section class="sidebar p-3">
  <div class="close-sidebar mb-2" id="close-sidebar">
    <i class="fa-solid fa-xmark"></i>
  </div>
  <div class="filter-container">
    <strong>Product Categories</strong>
    <hr class="product-hr">
    <ul id="product-ul">
      <li><strong></strong>Men</li>
      <li><strong></strong>Sale</li>
      <li><strong></strong>Preorder</li>
      <li><strong></strong>Sportify Pro</li>
    </ul>
  </div>
  <div class="filter-container">
    <strong>By Price</strong>
    <hr class="product-hr">


    <div class="slider">
      <div class="progress"></div>
    </div>
    <div class="range-input">
      <input type="range" class="range-min" min="0" max="4000" value="0" step="100">
      <input type="range" class="range-max" min="0" max="4000" value="4000" step="100">
    </div>

    <div class="price-input">
      <div class="field">
        <span>Min</span>
        <input type="number" class="input-min" value="0">
      </div>
      <div class="separator">-</div>
      <div class="field">
        <span>Max</span>
        <input type="number" class="input-max" value="4000">
      </div>
    </div>

    <button type="button" class="btn btn-outline-dark mb-3">Filter</button>

  </div>
  <div class="filter-container">
    <strong>By Size</strong>
    <hr class="product-hr">
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="2xl" id="2xl">
      <label class="form-check-label" for="2xl">
        2xl
    </div>
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="custom" id="Custom">
      <label class="form-check-label" for="Custom">
        Custom
    </div>
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="l" id="L">
      <label class="form-check-label" for="L">
        L
    </div>
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="m" id="M">
      <label class="form-check-label" for="M">
        M
    </div>
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="s" id="S">
      <label class="form-check-label" for="S">
        S
    </div>
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="xl" id="Xl">
      <label class="form-check-label" for="Xl">
        Xl
    </div>
    <div class="form-check">
      <input class="form-check-input flexCheckDefault" type="checkbox" value="xs" id="Xs">
      <label class="form-check-label" for="Xs">
        Xs
    </div>
  </div>
</section>


<button class="open-sidebar" id="open-sidebar">
<i class="fa-solid fa-filter"></i>
  <span class="sidebarText">Sidebar</span>
</button>

<div id="productMidContainer">

  <section id="lg-screen-sidebar" class="aside p-3">
    <div class="filter-container">
      <strong>Product Categories</strong>
      <hr class="product-hr">
      <ul id="product-ul">
        <li><strong></strong>Men</li>
        <li><strong></strong>Sale</li>
        <li><strong></strong>Preorder</li>
        <li><strong></strong>Sportify Pro</li>
      </ul>
    </div>
    <div class="filter-container">
      <strong>By Price</strong>
      <hr class="product-hr">


      <div class="slider">
        <div class="progress"></div>
      </div>
      <div class="range-input">
        <input type="range" class="range-min" min="0" max="4000" value="0" step="100">
        <input type="range" class="range-max" min="0" max="4000" value="4000" step="100">
      </div>

      <div class="price-input">
        <div class="field">
          <span>Min</span>
          <input type="number" class="input-min" value="0">
        </div>
        <div class="separator">-</div>
        <div class="field">
          <span>Max</span>
          <input type="number" class="input-max" value="4000">
        </div>
      </div>

      <button type="button" class="btn btn-outline-dark mb-3">Filter</button>

    </div>
    <div class="filter-container">
      <strong>By Size</strong>
      <hr class="product-hr">
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="2xl" id="2xl">
        <label class="form-check-label" for="2xl">
          2xl
      </div>
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="custom" id="Custom">
        <label class="form-check-label" for="Custom">
          Custom
      </div>
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="l" id="L">
        <label class="form-check-label" for="L">
          L
      </div>
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="m" id="M">
        <label class="form-check-label" for="M">
          M
      </div>
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="s" id="S">
        <label class="form-check-label" for="S">
          S
      </div>
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="xl" id="Xl">
        <label class="form-check-label" for="Xl">
          Xl
      </div>
      <div class="form-check">
        <input class="form-check-input flexCheckDefault" type="checkbox" value="xs" id="Xs">
        <label class="form-check-label" for="Xs">
          Xs
      </div>
    </div>
  </section>


  <section class="row">
  @foreach ($products as $product)
    <div class="col-lg-4 col-md-6 col-6 product-box">
      <a href="productDetail/{{ $product->id }}" class="anchor-styling">
        <div class="product-image"><img src="{{ asset('assets/' . $product->img1) }}" alt="{{ $product->name }}"></div>
        <h6><strong>{{ $product->name }}</strong></h6>
        <span>Rs. {{ $product->price }}</span>
      </div>
      </a>
  @endforeach
  </section>
</div>
@endsection