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
        <img src="assets/banner-landscape.png" alt="Second Slide" class="d-block w-90 bannerimg">
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


  <section class="categories row d-flex justify-content-center">
    <div class="col-md-5 m-2 col-11 category-container" id="pic1">
        <img class="img-fluid img-fluid-1" id="a1" src="assets/Cat-1.jpg" alt="Men Category">
        <button class="category-button1"><span>Men Top</span></button>
    </div>

    <div class="col-md-6 col-11 m-2">
        <div class="row d-flex justify-content-between">
            <div class="col-6" style="padding-left:0; padding-right:0;">
                <div class="category-container mb-2">                                              
                    <img class="img-fluid img-fluid-1" src="assets/Cat-2.jpg" alt="Men Category">
                    <button class="category-button"><span>Trousers</span></button>
                </div>
                <div class="category-container mt-2">
                    <img class="img-fluid img-fluid-1" src="assets/Cat-3.jpg" alt="Men Category">
                    <button class="category-button"><span>Shorts</span></button>
                </div>
            </div>
            <div class="col-5 category-container ml-1" id="pic2" style="min-width:46%">
                <img class="img-fluid img-fluid-1" src="assets/Cat-4.jpg" alt="Men Category">
                <button class="category-button"><span>Tracksuits</span></button>
            </div>
        </div>
    </div>

  </section>



  <div class="container">
    <div class="top-categories">
      <h2>VISIONARY REALM OF SPORTIFY WEAR</h2>
      <p><i>This is not just a brand; it's a movement. Welcome to the Vision.</i></p>
    </div>
  </div>
  
  <div class="banner-holder">
    <div class="banner">
      <img id="dynamicImage" class="img-banner" src="assets/banner-landscape.png" alt="Banner Image">
    </div>
  </div>
  
  
  
  
  <div class="container">
    <div class="top-categories">
      <h2>SPORTIFY PRO COLLECTION</h2>
      <p><i>THIS IS OUR PREMIUM COLLECTION WITH FINEST FABRIC AND STITCHING.</i></p>
    </div>
  </div>

  <section class="categories row">
    <div class="col-12 col-md-12 col-lg-6 product-container">
        <img class="image1" src="assets/athlete-2.png" alt="Men Category">
        <!-- <button class="category-button1"><span>Men Top</span></button> -->
    </div>

    <div class="col-12 col-md-12 col-lg-6">
        <div class="row">
          <div class="col-6 col-md-3 col-lg-6 img-cont">                                                
            <div class="images"><img src="assets/model1.png" alt=""></div>
            <h6><strong>Spandex DriFit Tee</strong></h6>
            <span>Rs. 1,500</span>
          </div>
          <div class="col-6 col-md-3 col-lg-6 img-cont">                                                
            <div class="images"><img src="assets/model3.jpg" alt=""></div>
            <h6><strong>Vision Graphic Hoodie</strong></h6>
            <span>Rs. 3,000</span>
          </div>
          <div class="col-6 col-md-3 col-lg-6 img-cont">
            <div class="images"><img src="assets/model4.png" alt=""></div>
            <h6><strong>Black Chaos Hoodie</strong></h6>
            <span>Rs. 3,200</span>
          </div>
          <div class="col-6 col-md-3 col-lg-6 img-cont">
            <div class="images"><img src="assets/model2.png" alt=""></div>
            <h6><strong>Halcyon Graphic Tee</strong></h6>
            <span>Rs. 1,600</span>
          </div>
        </div>
    </div>

  </section>





  <div class="best-selling-container">
    <h2>OUR BEST SELLING PRODUCTS</h2>
    <p><i>Whether your goals are to improve weight or body composition, increase strength and function, or improve overall
            health, resistance training can help you get there.</i></p>
  </div>

  <section class="row products">
      <div class="col-xl-3 col-lg-4 col-md-6 col-6 product-box">
        <div class="images"><img src="assets/Cat-1.jpg" alt=""></div>
        <h6><strong>Black 3-Stripe DriFit Tee</strong></h6>
        <span>Rs. 900</span>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6 col-6 product-box">
        <div class="images"><img src="assets/Cat-2.jpg" alt=""></div>
        <h6><strong>3-Stripe DriFit Trouser</strong></h6>
        <span>Rs. 1,600</span>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6 col-6 product-box">
        <div class="images"><img src="assets/Cat-3.jpg" alt=""></div>
        <h6><strong>Adidas Polyster Short</strong></h6>
        <span>Rs. 2,000</span>
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 col-6 product-box">
        <div class="images"><img src="assets/Cat-4.jpg" alt=""></div>
        <h6><strong>Half-Stripes Drifit Tracksuit</strong></h6>
        <span>Rs. 2,300</span>
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