<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    
    
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    


    <link rel="icon" href="{{asset('assets/favicon.png')}}">
    <link href="{{ asset('css/deleteProds.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <title>Admin Dashboard</title>
    <style>

        .admin-panel {
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 120vh;
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


  @if (session('deletionsuccess'))
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          var successModal = new bootstrap.Modal(document.getElementById('successModal'));
          successModal.show();
      });
  </script>
  @endif

</head>

<body>
    <nav class="navbar navbar-expand-lg navigation" style="background-color: black; height: 150px;">
        <!-- Logo on the left -->
        <a class="navbar-brand d-flex align-self-center pl-2 mx-2 mr-auto" href="{{ asset('index') }}">
            <img class="logo" src="{{ asset('assets/white-logo.png') }}" alt="Sportify Wear" style="width: 150px; height: auto;">
        </a>
    </nav>

    <!-- Admin Panel on the left -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 admin-panel">
            <h3 id="dashboardLink">DASHBOARD</h3>
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


    <!-- Bootstrap deletion success modal -->
  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="successModalLabel">Product Deleted</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: white;">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <div class="d-flex align-items-center justify-content-center rounded-circle bg-success text-white p-3 mb-3" style="font-size: 1.5em; width: 50px; height: 50px; margin: 0 auto;">
            <span style="font-size: 1.5em; color: white;">&#10004;</span>
          </div>
          <p style="font-size: 16px;"><strong>The product has been successfully deleted.</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

      // Event listener when clicking on dashboard line
      document.getElementById('dashboardLink').addEventListener('click', function() {
        window.location.href = "{{ route('dashboard') }}";
      });
    });
  </script>

</body>

</html>





