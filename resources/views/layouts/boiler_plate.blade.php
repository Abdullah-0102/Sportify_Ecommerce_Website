<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="icon" href="{{asset('assets/favicon.png')}}">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  @yield('css')
  <script src="{{ asset('js/cart.js') }}" defer></script>
  <script src="{{ asset('js/indexcode.js') }}" defer></script>
  <title>Sportify Wear</title>
</head>

<body>
  <!-- Navbar Design-->
  <nav class="navbar navbar-expand-lg navigation bg-white sticky-top">
    <button class="navbar-toggler text-left" type="button" data-toggle="collapse" data-target="#navbar-items">
      <span><i class="fa-solid fa-bars fa-xl"></i></span>
    </button>
    <a class="navbar-brand d-flex align-self-center" href="#"><img class="logo" src="{{ asset('assets/logo.png') }}" alt="Sportify Wear"></a>



    <div class="d-flex order-lg-1 pr-2">
      <a href="#" class="navbar-text" id="hidden-search"><i class="fa-solid fa-magnifying-glass fa-xl icon color" id="hide-search-icon"></i></a>
      <a href="#" class="navbar-text" id="user"><i class="fa-regular fa-user fa-xl icon color"></i></a>
      <a href="#" class="navbar-text" id="heart"><i class="fa-regular fa-heart fa-xl icon color"></i></a>
      <span href="#" class="navbar-text" id="open-cart-sidebar"><i class="fa-solid fa-cart-shopping fa-xl icon color"></i></span>
    </div>

    <section class="cart-sidebar p-3">
      <div class="close-cart-sidebar mb-2" id="close-cart-sidebar">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <!-- Cart Heading -->
      <div class="row">
        <div class="col-10">
          <strong>SHOPPING CART</strong>
          <hr class="product-hr">
        </div>
      </div>

      <!-- Items Section -->
      <div class="row h-50" id="cart-items-section">
        <div class="col">

          @php
          $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
          @endphp

          @if(count($cartItems) > 0)
          @foreach($cartItems as $index => $item)
          <div class="row cart-item-row justify-content-center my-4">
            <div class="col-5">
              <img class="cart-img" src="{{ asset('assets/' . $item['img']) }}" alt="Cart Item">
            </div>
            <div class="col-6 small-font">

              <div class="row">
                <div class="col">
                  {{ $item['name'] }}
                </div>
              </div>

              <div class="row gray-color" style="font-size: x-small;">
                <div class="col">
                  {{ $item['color'] }} / {{ $item['size'] }}
                </div>
              </div>

              <div class="row dark-gray-color" style="font-size: smaller;">
                <div class="col">
                  Rs. {{ $item['price'] }}
                </div>
              </div>

              <div class="row">
                <div class="col-7" style="font-size: smaller;">
                  Qty : {{ $item['quantity'] }}
                </div>

                <div class="col">
                  <i name="{{ $index }}" class="fa-solid fa-trash fa-xl del"></i>
                </div>
              </div>


            </div>
          </div>
          @endforeach
          @else
          <p>No items in the cart.</p>
          @endif
          <!-- item 1 -->
          <!-- <div class="row cart-item-row justify-content-center my-4">
            <div class="col-5">
              <img class="cart-img" src="{{ asset('assets/Cat-1.jpg') }}" alt="">
            </div>
            <div class="col-6 small-font">

              <div class="row">
                <div class="col">
                  Mens Sports Shirt
                </div>
              </div>

              <div class="row gray-color" style="font-size: x-small;">
                <div class="col">
                  Black / 2XL
                </div>
              </div>

              <div class="row dark-gray-color" style="font-size: smaller;">
                <div class="col">
                  Rs. 2400
                </div>
              </div>

              <div class="row">
                <div class="col-7" style="font-size: smaller;">
                  Qty : 2
                </div>

                <div class="col">
                  <i class="fa-solid fa-trash fa-xl"></i>
                </div>
              </div>


            </div>
          </div> -->
          <!-- item 2 -->
          <!-- <div class="row cart-item-row justify-content-center my-4">
            <div class="col-5">
              <img class="cart-img" src="{{ asset('assets/Cat-1.jpg') }}" alt="">
            </div>
            <div class="col-6 small-font">

              <div class="row">
                <div class="col">
                  Mens Sports Shirt
                </div>
              </div>

              <div class="row gray-color" style="font-size: x-small;">
                <div class="col">
                  Black / 2XL
                </div>
              </div>

              <div class="row dark-gray-color" style="font-size: smaller;">
                <div class="col">
                  Rs. 2400
                </div>
              </div>

              <div class="row">
                <div class="col-7" style="font-size: smaller;">
                  Qty : 2
                </div>

                <div class="col">
                  <i class="fa-solid fa-trash fa-xl"></i>
                </div>
              </div>


            </div>
          </div> -->

        </div>


      </div>

      <!-- Checkout Button -->
      <div class="row my-3">
        <div class="col d-flex justify-content-center align-items-center">
          <button type="button" class="btn btn-outline-dark w-75 my-3">Checkout</button>
        </div>
      </div>
    </section>

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

  <script>
    document.querySelectorAll(".del").forEach(delElement => {
      // Add click event listener to each <del> element
      delElement.addEventListener('click', function() {

        let previousURL = encodeURL(window.location.pathname);
        alert(previousURL);

        // Retrieve the value of the 'name' attribute
        let attributeName = this.getAttribute('name');
        window.location.href = `/delete/${attributeName}/${previousURL}`;
        alert(window.location.href);
      });
    });


    function encodeURL(urlString) {
      let encodedString = urlString.replace(/\//g, ''); // Remove all '/'
      let positions = [];

      // Store positions of removed '/' in an array
      urlString.split('').forEach((char, index) => {
        if (char === '/') {
          positions.push(index);
        }
      });

      return encodedString + '_' + positions.join(','); // Append positions information
    }

    // let originalURL = "/table/2/subfolder/3";
    // let encodedURL = encodeURL(originalURL);
    // console.log(encodedURL); // Output: "table2subfolder3_5,11" (Assuming '/' were at indices 5 and 11)



  </script>
</body>

</html>