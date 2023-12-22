@extends('layouts.boiler_plate')
@section('css')
<link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">
@endsection

@section('content')
@foreach ($product as $p)
  <!-- Product Pictures Section -->
  <section class="row">
    <div class="col-md-7 col-sm-12">
      <div class="row " id='background' style="background-image: url('{{ asset('assets/bg.jpg') }}');">
        <div class="col img-fluid d-flex justify-content-center align-items-center">
          <div class="adjust" style="height: 100%;">
            <img class="main img-fluid" src="{{ asset('assets/' . $p->img1) }}" alt="Main Image" style="object-fit:contain;">
          </div>
        </div>
      </div>
      <div class="row" style="height: 20%; margin :10px 0px;">
        <div class="col-3 d-flex justify-content-center align-items-center">
          <div class="adjust" style="overflow: hidden;">
            <img class="img-fluid p-imgs clicked" src="{{ asset('assets/' . $p->img1) }}" alt="" style="height:100%; width: 100%; ">
          </div>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
          <div class="adjust" style="overflow: hidden;">
            <img class="img-fluid p-imgs scaling-image" src="{{ asset('assets/' . $p->img2) }}" alt="" style="height:100%; width: 100%; ">
          </div>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
          <div class="adjust" style="overflow: hidden;">
            <img class="img-fluid p-imgs scaling-image" src="{{ asset('assets/' . $p->img3) }}" alt="" style="height:100%; width: 100%; ">
          </div>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
          <div class="adjust" style="overflow: hidden;">
            <img class="img-fluid p-imgs scaling-image" src="{{ asset('assets/' . $p->img4) }}" alt="" style="height:100%; width: 100%; ">
          </div>
        </div>

      </div>
    </div>
    <!-- Product Details Section -->
    <div class="col-md-5 col-sm-12" style="padding:40px;">
      <div class="row">
        <div class="col">
          <span id="p-title">
            {{ $p->name }}
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span id="price">
            Rs. {{ $p->price }}
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span id="tax">
            Tax Included
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span id="sold">
            <span class="blinking-text"><i class="fa-solid fa-fire"></i></span> <strong>5</strong> sold in last <strong>8</strong> hours
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span class="info-text gray-color">
            {{ $p->description }}
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label class="color-label">COLOR : {{ $colors[0]['color']->color }}</label>
          <div class="select-color">
            @foreach ($colors as $key => $c)
            <input class="radio color-option" type="radio" name="select-color" id="clr-{{ $c['color']->color }}" value="{{ $c['color']->color }}" {{ $key === 0 ? 'checked' : '' }}>
            <label for="clr-{{ $c['color']->color }}"><span style="background-color: {{ $c['color']->hex_code }};"></span></label>
            @endforeach
          </div>

          <label class="size-label">Size:</label>
          <div class="select-size">
            @foreach ($colors as $c)
            <div class="size-options" data-color="{{ $c['color']->color }}" style="display: none;">
              @foreach ($c['sizes'] as $size)
              <input class="radio" type="radio" name="select-size-{{ $c['color']->color }}" id="size-{{ $c['color']->color }}-{{ $size->id }}" value="{{ $size->size }}" {{ $size->size === 'Small' ? 'checked' : '' }}>
              <label for="size-{{ $c['color']->color }}-{{ $size->id }}"><span>{{ $size->size }}</span></label>
              @endforeach
            </div>
            @endforeach
          </div>


        </div>
      </div>
      <div class="row quantity">
        <div class="col-md-4">
          <div id="item-count">
            <span><strong>-</strong></span>
            <span></span>
            <span><strong>+</strong></span>
          </div>
        </div>
        <div class="col-lg-8">
          <span class="add-to-cart">ADD TO CART</span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <span class="info-item">Delivery and Return</span>
          <span class="info-item">Ask a question</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Description Section -->
  <section id="info" class="m-4 pl-3 pt-4">
    <div class="row" data-toggle="collapse" href='#description'>
      <div class="col-11 info-item">Description</div>
      <div class="col-1 d-flex justify-content-center align-items-center">
        <span class="plus"><i class="fa-solid fa-plus"></i></span>
      </div>
    </div>
    <div class="row collapse" id="description">
      <div class="col gray-color info-text">
        <p>
          {{ $p->description }}
        </p>
        <h6 class="dark-gray-color">Key Features</h6>
        <ul class="info-unordered-list pl-4">
          <li>Incorporates excellent stretch and recovery,
            allowing for flexibility and long-lasting durability during workouts and activities.</li>
          <li>Crafted with Speedo fabrics, providing a lightweight and breathable design,
            perfect for all-day wear.</li>
          <li>Quick-drying properties ensure a dry
            and comfortable experience during intense workout sessions or casual activities.</li>
          <li>Designed with a blend of materials for a cozy and adaptable feel</li>
        </ul>
      </div>
    </div>


    <div class="row" data-toggle="collapse" href='#additional-info'>
      <div class="col-11 info-item">Additional info</div>
      <div class="col-1 d-flex justify-content-center align-items-center">
        <span class="plus"><i class="fa-solid fa-plus"></i></span>
      </div>
    </div>
    <div class="row px-4 collapse" id="additional-info">
      <div class="col table-text">
        <div class="row">
          <div class="col-3 font-weight-bold border p-2">Colors</div>
          <div class="col-9 border p-2">Black</div>
        </div>
        <div class="row">
          <div class="col-3 font-weight-bold border p-2">Sizes</div>
          <div class="col-9 border p-2">S, M, L, XL, 2XL</div>
        </div>
      </div>
    </div>


    <div class="row" data-toggle="collapse" href="#RE">
      <div class="col-11 info-item">Return and Exchange Policy</div>
      <div class="col-1 d-flex justify-content-center align-items-center">
        <span class="plus"><i class="fa-solid fa-plus"></i></span>
      </div>
    </div>
    <div class="row collapse" id="RE">
      <div class="col gray-color info-text mt-3">
        <p>
          To ensure shopping at Sportify Wear is a swift and worry free experience,
          our exchange and return policies are structured to favor our customers.
          Please review the following policies before initiating a return or exchange request.
        </p>
        <h6 class="dark-gray-color">Exchange Terms</h6>
        <span>Please make sure the following exchange policy guidelines are met:</span>
        <ul class="info-unordered-list pl-4">
          <li>An exchange request must be initiated within 7 days of receiving the items.</li>
          <li>Items must be repackaged back in original packaging with labels and tags on.</li>
          <li>Items must be undamaged, unworn and unwashed.</li>
          <li>Exchange Delivery charges of pkr 250 are applicable.</li>
        </ul>
        <h6 class="dark-gray-color">Return Terms</h6>
        <span>Please make sure the following return policy guidelines are met:</span>
        <ul class="info-unordered-list pl-4">
          <li>Items must be repackaged back in original packaging with labels and tags on.</li>
          <li>Items must be undamaged, unworn and unwashed.</li>
          <li>Reason of return must be legit example (Wrong order or the product damaged / torn).</li>
          <li>Delivery charges will be deducted from the actual order and rest of the payment will be processed via JazzCash or Bank Transfer.</li>
        </ul>
        <p>
          To exchange/refund your items,
          simply return the package back to our address and
          as soon as we receive it we will dispatch the replacement or pay you back.
          Get in touch with our team via email <span class="font-weight-bold text-dark">hr.sportifywear@gmail.com</span> for any further assistance
        </p>
      </div>
    </div>


  </section>
  @endforeach
@endsection


@section('js')
<script src="{{ asset('js/product.js') }}"></script>
@endsection