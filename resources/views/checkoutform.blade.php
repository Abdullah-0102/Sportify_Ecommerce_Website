<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link rel="icon" href="assets/favicon.png">
    <link href="{{ asset('css/checkoutform.css') }}" rel="stylesheet">



    <title>Checkout Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navigation bg-white">
        <!-- Logo on the left -->
        <a class="navbar-brand d-flex align-self-center pl-2 mx-4 mr-auto" href="{{ asset('index') }}">
            <img class="logo" src="{{ asset('assets/grey-logo.png') }}" alt="Sportify Wear" style="width: 150px; height: auto;">
        </a>

        <!-- Icon on the right -->
        <div class="d-flex order-lg-1 pr-4 ml-auto mr-5">
            <a href="#" class="navbar-text" id="cart"><i class="fa fa-shopping-cart fa-xl icon icon-color"></i></a>
        </div>
    </nav>



    <div class="row checkout-container">
        <div class="col-75">
            <div class="container">
                <form action="/action_page.php" id="checkoutForm">

                    <div class="row addr-bill-cont">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="fname"><i class="fa fa-user"></i> First Name</label>
                                    <div class="error-message" id="fname-error"></div>
                                    <input type="text" id="fname" name="fname" placeholder="Abdullah" required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="lname"><i class="fa fa-user"></i> Last Name</label>
                                    <div class="error-message" id="lname-error"></div>
                                    <input type="text" id="lname" name="lname" placeholder="Imran" required>
                                </div>
                            </div>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <div class="error-message" id="email-error"></div>
                            <input type="text" id="email" name="email" placeholder="ab123@gmail.com" autocomplete="on" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address </label>
                            <div class="error-message" id="address-error"></div>
                            <input type="text" id="adr" name="address" placeholder="H#10, St#20, F7, Islamabad." autocomplete="on" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <div class="error-message" id="city-error"></div>
                            <input type="text" id="city" name="city" placeholder="Islamabad" required>
                            <label for="country"><i class="fa fa-globe"></i> Country</label>
                            <select id="country" name="country">
                                <option value="pakistan" selected>Pakistan</option>
                            </select>

                            <div class="row">
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="45230">
                                </div>
                            </div>
                            <label>
                                <input type="checkbox" checked="checked" name="sameadr"> Save this information for next time
                            </label>

                            <div class="card border-primary custom-card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="rounded-left">
                                        <p class="mb-0">Shipping Free</p>
                                    </div>
                                    <div class="rounded-right">
                                        <strong>FREE</strong>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-50">
                            <h3>Payment Methods</h3>

                            <div class="card border-primary custom-card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="rounded-left">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Cash On Delivery (COD)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>
                                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                            </label>
                        </div>

                    </div>




                    <input type="submit" value="COMPLETE ORDER" class="btn checkout-button" id="submit_button">

                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
                <!-- Button to toggle the collapse on smaller screens -->
                <button class="btn btn-primary d-sm-none" type="button" data-bs-toggle="collapse" data-bs-target="#cartCollapse" aria-expanded="false" aria-controls="cartCollapse">
                    Order Summary <i class="fa fa-chevron-down"></i>
                </button>

                <!-- Collapsible content -->
                <div class="collapse d-sm-block" id="cartCollapse">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart fa-xs"></i> <b>4</b></span></h4>
                    <hr>
                    <p><a href="#">Spandex DriFit Tee </a> <span class="price">Rs. 1,500</span></p>
                    <p><a href="#">Vision Graphic Hoodie</a> <span class="price">Rs. 3,000</span></p>
                    <p><a href="#">Black Chaos Hoodie</a> <span class="price">Rs. 3,200</span></p>
                    <p><a href="#">Halcyon Graphic Tee</a> <span class="price">Rs. 1,600</span></p>
                    <hr>
                    <p>Total <span class="price" style="color:black"><b>Rs. 9,300</b></span></p>
                </div>
            </div>
        </div>


        <!-- Bootstrap Modal for order confirmation -->
        <div class="modal fade" id="orderConfirmationModal" tabindex="-1" aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderConfirmationModalLabel">Order Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Your order has been confirmed <span class="text-success">&#10004;</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function validateForm() {
                var formElements = document.getElementById('checkoutForm').elements;
                var isValid = true;

                // Clearing all the error messages
                var errorMessages = document.getElementsByClassName('error-message');
                for (var i = 0; i < errorMessages.length; i++) {
                    errorMessages[i].innerHTML = ' ';
                }

                for (var i = 0; i < formElements.length; i++) {
                    var element = formElements[i];
                    
                    // Skip elements without validation
                    if (!element.hasAttribute('required')) {
                        continue;
                    }

                    if (element.type != 'checkbox' && element.value.trim() == '') {
                        isValid = false;
                        
                        // Highlight the empty field
                        element.classList.add('is-invalid');

                        // Display "THIS FIELD IS REQUIRED" message
                        if (element.id === 'fname') {
                            if (!element.value.trim()) {
                                console.log('fname is required');
                                document.getElementById('fname-error').innerHTML = 'This field is required';
                                element.focus();
                            } 
                        }
                        if (element.id === 'lname') {
                            if (!element.value.trim()) {
                                console.log('lname is required');
                                document.getElementById('lname-error').innerHTML = 'This field is required';
                                element.focus();
                            } 
                        }
                        if (element.id === 'email') {
                            if (!element.value.trim()) {
                                console.log('email is required');
                                document.getElementById('email-error').innerHTML = 'This field is required';
                                element.focus();
                            } 
                        }
                        if (element.id === 'adr') {
                            if (!element.value.trim()) {
                                console.log('address is required');
                                document.getElementById('address-error').innerHTML = 'This field is required';
                                element.focus();
                            } 
                        }
                        if (element.id === 'city') {
                            if (!element.value.trim()) {
                                console.log('city is required');
                                document.getElementById('city-error').innerHTML = 'This field is required';
                                element.focus();
                            } 
                        }

                       
                    }
                }

                return isValid;
            }

            document.querySelector('#submit_button').addEventListener('click', function(event) {
                event.preventDefault(); 

                console.log('before');
                var isValid = validateForm();
                console.log('after');

                if (isValid) {
                    var orderConfirmationModal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
                    orderConfirmationModal.show();

                    document.getElementById('checkoutForm').reset();
                }
            });
        });


    </script>




</body>

</html>