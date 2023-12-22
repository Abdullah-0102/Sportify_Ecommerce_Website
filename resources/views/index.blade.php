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
      
    
  </div>

  <section class="categories row">
    <div class="col-md-6 col-10 category-container">
        <img class="img-fluid" src="assets/Cat-1.jpg" alt="Men Category">
        <button class="category-button"><span>Men Top</span></button>
    </div>

    <div class="col-md-6 col-10">
        <div class="row">
            <div class="col-6">
                <div class="category-container">
                    <img class="img-fluid" src="assets/Cat-2.jpg" alt="Men Category">
                    <button class="category-button"><span>Trousers</span></button>
                </div>
                <div class="category-container">
                    <img class="img-fluid" src="assets/Cat-3.jpg" alt="Men Category">
                    <button class="category-button"><span>Shorts</span></button>
                </div>
            </div>
            <div class="col-6 category-container">
                <img class="img-fluid" src="assets/Cat-4.jpg" alt="Men Category">
                <button class="category-button"><span>Tracksuits</span></button>
            </div>
        </div>
    </div>

</section>

  <!-- Services Section -->
  <section class="services">
    <div id="truck" class="service-box">
      <i class="p-2 fa-solid fa-truck-fast fa-2xl service-logo"></i>
      <p class="bold-text">WE DELIVER ALL OVER PAKISTAN</p>
      <p class="para-text">Shipping only Rs 250/-</p>
    </div>
    <div id="truck" class="service-box">
      <i class="p-2 fa-solid fa-headset fa-2xl service-logo"></i>
      <p class="bold-text">SUPPORT 24/7</p>
      <p class="para-text">Contact us 24 hours a day, 7 days a week.</p>
    </div>
    <div id="truck" class="service-box">
      <i class="p-2 fa-solid fa-hand-holding-dollar fa-2xl service-logo"></i>
      <p class="bold-text">RETURN AND EXCHANGE</p>
      <p class="para-text">Simply return it within 14 days for an exchange. Terms and conditions apply.</p>
    </div>
  </section>
@endsection





<!-- Every table will have a model, 10 tables then 10 models. -->
<!-- If table 'student', then model name 'students' -->
<!-- Create a table attribute in the model class so that the model knows which table it has to communicate with -->