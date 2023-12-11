@extends('layouts.boiler_plate')
@section('content')
<!-- Carousel Section  -->
<section id="carousel-with-indicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-with-indicators" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-with-indicators" data-slide-to="1"></li>
      <li data-target="#carousel-with-indicators" data-slide-to="2"></li>
    </ol>

    <!-- images for carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/Carousel-Img1.jpg" alt="First Slide" class="d-block w-90">
      </div>
      <div class="carousel-item">
        <img src="assets/Carousel-Img1.jpg" alt="Second Slide" class="d-block w-90">
      </div>
      <div class="carousel-item">
        <img src="assets/Carousel-Img1.jpg" alt="Third Slide" class="d-block w-90">
      </div>
    </div>

    <!-- Control Buttons for carousel -->
    <a href="#carousel-with-indicators" class="carousel-control-prev" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" area-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a href="#carousel-with-indicators" class="carousel-control-next" role="button" data-slide="next">
      <span class="carousel-control-next-icon" area-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </section>

  
  <!-- Abdullah's code -->
  <div class="container">
    <div class="top-categories">
      <h2>TOP CATEGORIES</h2>
      <p><i>All of our products are made out of premium fabrics and are designed to get you through the toughest of work out sessions.
        In addition, our efficient quality control department cross checks each order before its shipped from our warehouses.</i></p>
    </div>
      
  
  <!-- <section class="row row1">
    <div class="col-5 position-relative">
        <img class="img-fluid" style="height: 100%; object-fit:cover" src="assets/Cat-1.jpg" alt="Men Category">
        <button class="img-overlay-btn">Men Top</button>
    </div>
    <div class="col-3 cat-2 position-relative">
        <img class="img-fluid" src="assets/Cat-2.jpg" alt="Shorts">
        <button class="img-overlay-btn2">Trousers</button>
        <img class="img-fluid" src="assets/Cat-3.jpg" alt="Trousers">
        <button class="img-overlay-btn3">Shorts</button>
    </div>
    <div class="col-4 position-relative" >
        <img class="img-fluid" style="height: 100%; object-fit:cover" src="assets/Cat-4.jpg" alt="Trousers">
        <button class="img-overlay-btn">Tracksuits</button>
    </div>

  </section> -->
    
  </div>

  <section class="top-categories row">

    <div class="col-md-6 col-10" style="position:relative">
    <img class="img-fluid" style="height: 100%; object-fit:cover;" src="assets/Cat-1.jpg" alt="Men Category">
    <button  style="position:absolute; padding:10px; left:20%; right:20%; bottom:10%; min-width:150px;">
    <span style="font-size:80%;">Men Top</span></button>
    </div>

    <div class="col-md-6 col-10">

      <div class="row">
      <div class="col-6">
        <div style="position:relative">
          <img class="img-fluid" style="height: 50%; object-fit:cover;" src="assets/Cat-2.jpg" alt="Men Category">
          <button  style="position:absolute; padding:10px; left:20%; right:20%; bottom:10%; min-width:100px;">
    <span style="font-size:80%;">Trousers</span></button>
        </div>
        <div style="position:relative">
          <img class="img-fluid" style="height: 50%; object-fit:cover;" src="assets/Cat-3.jpg" alt="Men Category">
          <button  style="position:absolute; padding:10px; left:20%; right:20%; bottom:10%; min-width:100px;">
    <span style="font-size:80%;">Shorts</span></button>
        </div>
    </div>
    <div class="col-6" style="position:relative">
    <img class="img-fluid" style="height: 100%; object-fit:cover;" src="assets/Cat-4.jpg" alt="Men Category">
    <button  style="position:absolute; padding:10px; left:20%; right:20%; bottom:10%; min-width:120px;">
    <span style="font-size:80%;">Tracksuits</span></button>
    </div>
      </div>
      
    </div>
  </section>

  <!-- Services Section -->
  <section class="services">
    <div id="truck" class="service-box">
      <i class="p-2 fa-solid fa-truck-fast fa-2xl service-logo"></i>
      <h5>WE DELIVER ALL OVER PAKISTAN</h5>
      <p>Shipping only Rs 250/-</p>
    </div>
    <div id="truck" class="service-box">
      <i class="p-2 fa-solid fa-headset fa-2xl service-logo"></i>
      <h5>SUPPORT 24/7</h5>
      <p>Contact us 24 hours a day, 7 days a week.</p>
    </div>
    <div id="truck" class="service-box">
      <i class="p-2 fa-solid fa-hand-holding-dollar fa-2xl service-logo"></i>
      <h5>RETURN AND EXCHANGE</h5>
      <p>Simply return it within 14 days for an exchange. Terms and conditions apply.</p>
    </div>
  </section>
@endsection