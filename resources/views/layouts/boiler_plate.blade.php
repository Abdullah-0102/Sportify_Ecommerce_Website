<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Font Awesome Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


  <link rel="icon" href="{{asset('assets/favicon.png')}}">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  
  @yield('css')
  @yield('js')
  <!-- <script src="{{ asset('js/indexcode.js') }}" defer></script> -->


  @if (session('ordersuccess'))
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          var orderConfirmationModal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
          orderConfirmationModal.show();
      });
  </script>
  @endif

  @if (session('deletionsuccess'))
  <script>
      document.addEventListener('DOMContentLoaded', function () {
          var successModal = new bootstrap.Modal(document.getElementById('successModal'));
          successModal.show();
      });
  </script>
  @endif



  <title>Sportify Wear</title>
</head>

<body>

  <!-- Navbar Design-->
  <nav class="navbar navbar-expand-lg navigation bg-white sticky-top">
    <button class="navbar-toggler text-left" type="button" data-toggle="collapse" data-target="#navbar-items">
      <span><i class="fa-solid fa-bars fa-xl"></i></span>
    </button>
    <a class="navbar-brand d-flex align-self-center" href="{{ route('index') }}"><img class="logo" src="{{ asset('assets/logo.png') }}" alt="Sportify Wear"></a>



    <div class="d-flex order-lg-1 pr-2">
      <a href="#" class="navbar-text" id="hidden-search"><i class="fa-solid fa-magnifying-glass fa-xl icon color" id="hide-search-icon"></i></a>
      <a href="#" class="navbar-text" id="user"><i class="fa-regular fa-user fa-xl icon color"></i></a>
      <a href="#" class="navbar-text" id="heart"><i class="fa-regular fa-heart fa-xl icon color"></i></a>
      <a href="#" class="navbar-text" id="open-cart-sidebar"><i class="fa-solid fa-cart-shopping fa-xl icon color"></i></a>
    </div>

    <!-- <section id="cart-sidebar">
      <div class="close-sidebar mb-2" id="close-cart-sidebar">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </section> -->

    <div class="collapse navbar-collapse" id="navbar-items">
      <div class="navbar-nav">
        <a class="nav-item nav-link active color" href="{{ route('index') }}">HOME</a>
        <a class="nav-item nav-link color" href="{{ route('products') }}">MEN</a>
        <a class="nav-item nav-link color" href="Sale">SALE</a>
        <a class="nav-item nav-link color" href="{{ route('preorder') }}">PREORDER</a>
        <a class="nav-item nav-link color" href="{{ route('contactUs') }}">CONTACT US</a>
      </div>
      <div class="nav-item nav-link ml-auto" id="right-nav-items">
        <div class="search">
          <input class="nav-input" type="text" name="s" autocomplete="off" placeholder="Search for products">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>

      </div>
    </div>
  </nav>

  @yield('content')


  <!-- Footer Section -->
  <footer>
    <!-- Footer for small screens -->
    <div class="small-footer-top">
      <button class="btn p-2" data-toggle="collapse" href="#get-in-touch" role="button" aria-expanded="false" aria-controls="get-in-touch">
        <span class="sm-ft-opt">
          <span class="font-weight-bold">GET IN TOUCH</span>
          <i class="fa-solid fa-plus"></i>
        </span>
      </button>
      <section class="p-4 collapse sm-ft-box" id="get-in-touch">
        <a href="#"><img src="{{ asset('assets/white-logo.png') }}" alt="Sportify Wear"></a>
        <p>
          <i class="fa-solid fa-location-dot"></i>
          <span class="m-auto">Plot no D1/3 Sector 21 K.I.A Karachi</span>
        </p>
        <p>
          <i class="fa-solid fa-envelope"></i>
          <span class="m-auto">info@gmail.com</span>
        </p>
        <p>
          <i class="fa-solid fa-phone"></i>
          <span class="m-auto">0333-3333113</span>
        </p>
        <p><span class="m-auto">
            <i class="p-2 fa-brands fa-facebook"></i>
            <i class="p-2 fa-brands fa-instagram"></i>
            <i class="p-2 fa-brands fa-tiktok"></i>
          </span></p>
      </section>

      <button class="btn p-2" type="button" data-toggle="collapse" data-target="#footer-categories" aria-expanded="false" aria-controls="footer-categories">
        <span class="sm-ft-opt">
          <span class="font-weight-bold">CATEGORIES</span>
          <i class="fa-solid fa-plus"></i>
        </span>
      </button>
      <section class="p-4 collapse p-1 footer-box" id="footer-categories">
        <p><a href="#" class="m-auto info-row">MEN WEAR</a></p>
        <p><a href="#" class="m-auto info-row">WOMEN WEAR</a></p>
        <p><a href="#" class="m-auto info-row">SPORTIFY PRO</a></p>
        <p><a href="#" class="m-auto info-row">SALE</a></p>
      </section>

      <button class="btn p-2" type="button" data-toggle="collapse" data-target="#footer-customer-care" aria-expanded="false" aria-controls="footer-customer-care">
        <span class="sm-ft-opt">
          <span class="font-weight-bold">CUSTOMER CARE</span>
          <i class="fa-solid fa-plus"></i>
        </span>
      </button>
      <section class="p-4 collapse p-1 footer-box" id="footer-customer-care">
        <p><a href="#" class="m-auto info-row">MY ACCOUNT</a></p>
        <p><a href="contactUs" class="m-auto info-row">CONTACT US</a></p>
        <p><a href="#" class="m-auto info-row">MY WISHLIST</a></p>
        <p><a href="#" class="m-auto info-row">FAQs</a></p>
        <p><a href="#" class="m-auto info-row">RETURN AND EXCHANGE</a></p>
        <p><a href="#" class="m-auto info-row">PRIVACY POLICY</a></p>
        <p><a href="#" class="m-auto info-row">TERMS AND CONDITIONS</a></p>
      </section>

      <button class="btn p-2" type="button" data-toggle="collapse" data-target="#footer-signup" aria-expanded="false" aria-controls="footer-customer-care">
        <span class="sm-ft-opt">
          <span class="font-weight-bold">NEWSLETTER SIGNUP</span>
          <i class="fa-solid fa-plus"></i>
        </span>
      </button>
      <section class="p-4 collapse p-1 footer-box align-self-center" id="footer-signup">
        <p class="font-weight-bold footer-section-heading">NEWSLETTER SIGNUP</p>
        <p><span class="m-auto">Subscribe to our newsletter and get 10% off on your first purchase.</span></p>
        <div>
          <span class="send-mail-input-box p-2">
            <input class="nav-input" type="text" placeholder="Your Email Address">
            <i class=" btn fa-xl fa-solid fa-paper-plane" style="color: white;"></i>
          </span>
        </div>
      </section>
    </div>

    <div class="footer-top px-2 ">

      <section class="p-1 footer-box">
        <a href="#"><img src="{{ asset('assets/white-logo.png') }}" alt="Sportify Wear"></a>
        <p>
          <i class="fa-solid fa-location-dot"></i>
          <span class="m-auto">Plot no D1/3 Sector 21 K.I.A Karachi</span>
        </p>
        <p>
          <i class="fa-solid fa-envelope"></i>
          <span class="m-auto">info@gmail.com</span>
        </p>
        <p>
          <i class="fa-solid fa-phone"></i>
          <span class="m-auto">0333-3333113</span>
        </p>
        <p><span class="m-auto">
            <i class="p-2 fa-brands fa-facebook"></i>
            <i class="p-2 fa-brands fa-instagram"></i>
            <i class="p-2 fa-brands fa-tiktok"></i>
          </span></p>
      </section>

      <section class="p-1 footer-box">
        <p class="font-weight-bold footer-section-heading">CATEGORIES</p>
        <p><a href="#" class="m-auto info-row">MEN WEAR</a></p>
        <p><a href="#" class="m-auto info-row">WOMEN WEAR</a></p>
        <p><a href="#" class="m-auto info-row">SPORTIFY PRO</a></p>
        <p><a href="#" class="m-auto info-row">SALE</a></p>
      </section>

      <section class="p-1 footer-box">
        <p class="font-weight-bold footer-section-heading">CUSTOMER CARE</p>
        <p><a href="#" class="m-auto info-row">MY ACCOUNT</a></p>
        <p><a href="contactUs" class="m-auto info-row">CONTACT US</a></p>
        <p><a href="#" class="m-auto info-row">MY WISHLIST</a></p>
        <p><a href="#" class="m-auto info-row">FAQs</a></p>
        <p><a href="#" class="m-auto info-row">RETURN AND EXCHANGE</a></p>
        <p><a href="#" class="m-auto info-row">PRIVACY POLICY</a></p>
        <p><a href="#" class="m-auto info-row">TERMS AND CONDITIONS</a></p>
      </section>

      <section class="p-1 footer-box">
        <p class="font-weight-bold footer-section-heading">NEWSLETTER SIGNUP</p>
        <p><span class="m-auto">Subscribe to our newsletter and get 10% off on your first purchase.</span></p>
        <div>
          <span class="send-mail-input-box p-2">
            <input class="nav-input" type="text" placeholder="Your Email Address">
            <i class=" btn fa-xl fa-solid fa-paper-plane" style="color: white;"></i>
          </span>
        </div>
      </section>
    </div>

    <div class="footer-bottom py-4">
      <div>Copyright &copy; 2023 <span style="color: gray;">SPORTIFY WEAR</span> all rights reserved. Developed by Beast
        inc Pvt Lmt</div>
      <div>
        <i class="fa-brands fa-cc-visa p-1 fa-2xl"></i>
        <i class="fa-brands fa-cc-mastercard p-1 fa-2xl"></i>
      </div>
    </div>
  </footer>


  <script src="js/script.js"></script>
  <!-- FontAwesome JavaScript -->
  <script src="https://kit.fontawesome.com/fbe66d1c65.js" crossorigin="anonymous"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  @yield('js')


  <!-- Bootstrap Modal for order confirmation -->
  <div class="modal fade" id="orderConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderConfirmationModalLabel">Order Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="d-flex align-items-center justify-content-center rounded-circle bg-success text-white p-3 mb-3" style="font-size: 1.5em; width: 50px; height: 50px; margin: 0 auto;">
                    <span style="font-size: 1.5em;">&#10004;</span>
                </div>
                <p style="font-size: 16px;"><strong>Your order has been confirmed.</strong><br> An order confirmation mail has been sent to your email address.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <div class="d-flex align-items-center justify-content-center rounded-circle bg-success text-white p-3 mb-3" style="font-size: 1.5em; width: 50px; height: 50px; margin: 0 auto;">
            <span style="font-size: 1.5em;">&#10004;</span>
          </div>
          <p style="font-size: 16px;"><strong>The product has been successfully deleted.</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>