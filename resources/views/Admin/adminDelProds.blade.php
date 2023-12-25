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

      <!-- Product Container on the right -->
      <div class="col-md-9">
        <section class="row prods-container">
          @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 col-6 product-box">
              <a href="productDetail/{{ $product->id }}" class="anchor-styling">
                <div class="product-image"><img src="assets/{{ $product->img1 }}" alt="{{ $product->name }}"></div>
              </a>
              <div class="small-container justify-content-between" style="display: flex;">
                <div class="small-container1">
                  <h6><strong>{{ $product->name }}</strong></h6>
                  <span>Rs. {{ $product->price }}</span>
                </div>
                <div class="small-container-2">
                  <button class="delete-btn" data-product-id="{{ $product->id }}">REMOVE</button>
                </div>
              </div>
            </div>
          @endforeach
        </section>
      </div>
    </div>
  </div>

  <!-- Mmodal for confirmation dialog to delete-->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-black text-white">
          <h5 class="modal-title" id="confirmationModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: beige;">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p style="font-size: 16px; margin-bottom: 0"><strong>This product will be deleted.</strong><br> Are you sure?</p>
        </div>
        <div class="modal-footer" style="padding-top: 0;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelDelete">Cancel</button>
          <a href="#" class="btn btn-danger" id="confirmDelete">Delete</a>
        </div>
      </div>
    </div>
  </div>







  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var modal = document.getElementById('confirmationModal');
      var deleteButtons = document.querySelectorAll('.delete-btn');

      // Event listener for each delete button
      deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
          $(modal).modal('show');

          var productId = button.getAttribute('data-product-id');
          document.getElementById('confirmDelete').setAttribute('data-product-id', productId);
        });
      });

      // Event listener for the confirm delete button
      document.getElementById('confirmDelete').addEventListener('click', function () {
        var productId = this.getAttribute('data-product-id');

        // setTimeout(function () {
          $(modal).modal('hide');
          // $(successModal).modal('show');
          window.location.href = 'delete/' + productId;
        // }, 1000);
      });


      // Event listener for the cancel delete button
      document.getElementById('cancelDelete').addEventListener('click', function () {
        $(modal).modal('hide');
      });

      // Event listener to close the modal if the user clicks outside of it
      window.addEventListener('click', function (event) {
        if (event.target === modal) {
          $(modal).modal('hide');
        }
      });
  });

  </script>
@endsection
