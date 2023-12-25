<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <script src="{{ asset('js/automail-server.js') }}" defer></script> -->



    <link rel="icon" href="assets/favicon.png">
    <link href="{{ asset('css/checkoutform.css') }}" rel="stylesheet">


    <title>Checkout Page</title>
</head>

<body>

    <div class="row checkout-container">
        <nav class="navbar navbar-expand-lg navigation bg-white">
            <!-- Logo on the left -->
            <a class="navbar-brand d-flex align-self-center pl-2 mx-2 mr-auto" href="{{ asset('index') }}">
                <img class="logo" src="{{ asset('assets/grey-logo.png') }}" alt="Sportify Wear" style="width: 150px; height: auto;">
            </a>

            <!-- Icon on the right -->
            <div class="d-flex order-lg-1 pr-4 ml-auto mr-3">
                <a href="#" class="navbar-text" id="cart"><i class="fa fa-shopping-cart fa-xl icon icon-color"></i></a>
            </div>
        </nav>


        <div class="col-75">
            <div class="container">
                <form id="checkoutForm" method="post" action="{{ route('sendMail') }}">
                    @csrf
                    <div class="row addr-bill-cont">
                        <div class="col-50">
                            <h4>Shipping Address</h4>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="fname"><i class="fa fa-user"></i> First Name</label>
                                    <div class="error-message" id="fname-error"></div>
                                    <input type="text" id="fname" name="fname" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="lname"><i class="fa fa-user"></i> Last Name</label>
                                    <div class="error-message" id="lname-error"></div>
                                    <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                                </div>
                            </div>
                            <label for="mobileNumber"><i class="fas fa-phone"></i> Contact Number</label>
                            <div class="error-message" id="phonenum-error"></div>
                            <input type="text" id="mobileNumber" name="mobileNumber" placeholder="03xx-xxxxxxx" required>
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
                            <h4>Payment Methods</h4>
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
                            <!-- <label>
                                <input type="checkbox" id="billingCheckbox" checked="checked" class="mb-3" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Billing address same as shipping
                            </label> -->




                            <!-- This div is supposed to appear if the billing address is different than shipping address -->

                            <!-- <div class="collapse billing-adr-body" id="collapseExample">
                                <div class="card card-body ">
                                    <h4>Billing Address</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="bill-fname"><i class="fa fa-user"></i> First Name</label>
                                            <div class="error-message" id="bill-fname-error"></div>
                                            <input type="text" id="bill-fname" name="bill-fname" placeholder="Abdullah" required>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="bill-lname"><i class="fa fa-user"></i> Last Name</label>
                                            <div class="error-message" id="bill-lname-error"></div>
                                            <input type="text" id="bill-lname" name="bill-lname" placeholder="Imran" required>
                                        </div>
                                    </div>
                                    <label for="bill-mobileNumber"><i class="fas fa-phone"></i> Contact Number</label>
                                    <div class="error-message" id="bill-phonenum-error"></div>
                                    <input type="text" id="bill-mobileNumber" name="bill-mobileNumber" placeholder="03xx-xxxxxxx" required>
                                    <label for="bill-email"><i class="fa fa-envelope"></i> Email</label>
                                    <div class="error-message" id="bill-email-error"></div>
                                    <input type="text" id="bill-email" name="bill-email" placeholder="ab123@gmail.com" autocomplete="on" required>
                                    <label for="bill-adr"><i class="fa fa-address-card-o"></i> Address </label>
                                    <div class="error-message" id="bill-address-error"></div>
                                    <input type="text" id="bill-adr" name="bill-adr" placeholder="H#10, St#20, F7, Islamabad." autocomplete="on" required>
                                    <label for="bill-city"><i class="fa fa-institution"></i> City</label>
                                    <div class="error-message" id="bill-city-error"></div>
                                    <input type="text" id="bill-city" name="bill-city" placeholder="Islamabad" required>
                                    

                                </div>
                            </div> -->

                        </div>

                    </div>

                    <input type="submit" value="COMPLETE ORDER" class="btn checkout-button" id="submit_button">
                    <!-- <a href="{{ route('sendMail') }}">Send Mail</a> -->



            </div>
            </form>
        </div>

        <div class="col-25">
            @php
            $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
            $sum = 0;
            @endphp
            <div class="container">
                <!-- Button to toggle the collapse on smaller screens -->
                <button class="btn btn-primary d-sm-none" type="button" data-bs-toggle="collapse" data-bs-target="#cartCollapse" aria-expanded="false" aria-controls="cartCollapse">
                    Order Summary <i class="fa fa-chevron-down"></i>
                </button>

                <!-- Collapsible content -->
                <div class="collapse d-sm-block" id="cartCollapse">
                    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart fa-xs"></i> <b>{{count($cartItems)}}</b></span></h4>
                    <hr>
                    @if(count($cartItems) > 0)
                    <?php $sum = 0; ?> <!-- Initialize sum variable outside the loop -->
                    @foreach($cartItems as $index => $item)
                    <?php $sum = $sum + $item['price']; ?> <!-- Calculate sum inside the loop -->
                    <p><a href="#">{{ $item['name'] }}</a> <span class="price">Rs. {{ $item['price'] }}</span></p>
                    @endforeach
                    
                    <hr>
                    <p>Total <span class="price" style="color:black"><b>Rs. {{ $sum }}</b></span></p> <!-- Display total outside the loop -->
                    @else
                    <p>No items in the cart.</p>
                    @endif
                </div>
            </div>
        </div>






    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function validateForm() {
                var formElements = document.getElementById('checkoutForm').elements;
                var isValid = true;

                var nameRegex = /^[A-Za-z]+$/;
                var regex = /^(03[0-9]{2}-[0-9]{7})$/;
                var emailRegex = /^\S+@\S+\.\S+$/;
                var cityRegex = /^[A-Za-z]+$/;


                // Clearing all the error messages
                var errorMessages = document.getElementsByClassName('error-message');
                for (var i = 0; i < errorMessages.length; i++) {
                    errorMessages[i].innerHTML = ' ';
                }


                // Remove 'is-invalid' class from all elements
                for (var i = 0; i < formElements.length; i++) {
                    formElements[i].classList.remove('is-invalid');
                }


                for (var i = 0; i < formElements.length; i++) {
                    var element = formElements[i];

                    // Skip elements without validation
                    if (!element.hasAttribute('required')) {
                        continue;
                    }


                    if (element.type != 'checkbox' && element.value.trim() == '') {
                        isValid = false;
                        console.log('Empty');

                        // Highlight the empty field
                        element.classList.add('is-invalid');

                        // Display "THIS FIELD IS REQUIRED" message
                        if (element.id === 'fname') {
                            if (!element.value.trim()) {
                                document.getElementById('fname-error').innerHTML = 'This field is required';
                                element.focus();
                            }
                        }
                        if (element.id === 'lname') {
                            if (!element.value.trim()) {
                                document.getElementById('lname-error').innerHTML = 'This field is required';
                                element.focus();
                            }
                        }
                        if (element.id === 'email') {
                            if (!element.value.trim()) {
                                document.getElementById('email-error').innerHTML = 'This field is required';
                                element.focus();
                            }
                        }
                        if (element.id === 'mobileNumber') {
                            if (!element.value.trim()) {
                                document.getElementById('phonenum-error').innerHTML = 'This field is required';
                                element.focus();
                            }
                        }
                        if (element.id === 'adr') {
                            if (!element.value.trim()) {
                                document.getElementById('address-error').innerHTML = 'This field is required';
                                element.focus();
                            }
                        }
                        if (element.id === 'city') {
                            if (!element.value.trim()) {
                                document.getElementById('city-error').innerHTML = 'This field is required';
                                element.focus();
                            }
                        }
                    }


                    // Validations to check all the input fields if value has been entered correctly
                    if (element.type != 'checkbox' && element.value.trim() != '' && element.id == 'mobileNumber') {
                        var mobileNumberInput = document.getElementById('mobileNumber');
                        var validationMessage = document.getElementById('phonenum-error');

                        if (!regex.test(mobileNumberInput.value)) {
                            validationMessage.innerHTML = 'Invalid mobile number. Please enter in the format 03xx-xxxxxxx.';
                            mobileNumberInput.value = '';
                            element.focus();
                            element.classList.add('is-invalid');
                            isValid = false;
                            console.log('phone');
                        }
                    }

                    if (element.type != 'checkbox' && element.value.trim() != '' && element.id == 'fname') {
                        var fnameInput = document.getElementById('fname');
                        var validationMessage = document.getElementById('fname-error');

                        if (!nameRegex.test(fnameInput.value)) {
                            validationMessage.innerHTML = 'Invalid First Name!';
                            fnameInput.value = '';
                            element.focus();
                            // element.classList.add('is-invalid');
                            isValid = false;
                            console.log('fname');
                        }
                    }

                    if (element.type != 'checkbox' && element.value.trim() != '' && element.id == 'lname') {
                        var lnameInput = document.getElementById('lname');
                        var validationMessage = document.getElementById('lname-error');

                        if (!nameRegex.test(lnameInput.value)) {
                            validationMessage.innerHTML = 'Invalid Last Name!';
                            lnameInput.value = '';
                            element.focus();
                            element.classList.add('is-invalid');
                            isValid = false;
                            console.log('lname');
                        }
                    }

                    if (element.type != 'checkbox' && element.value.trim() != '' && element.id == 'email') {
                        var emailInput = document.getElementById('email');
                        var validationMessage = document.getElementById('email-error');

                        if (!emailRegex.test(emailInput.value)) {
                            validationMessage.innerHTML = 'Invalid email address.';
                            emailInput.value = '';
                            emailInput.classList.add('is-invalid');
                            element.focus();
                            isValid = false;
                            console.log('email');
                        }
                    }


                    if (element.type != 'checkbox' && element.value.trim() != '' && element.id == 'city') {
                        var cityInput = document.getElementById('city');
                        var validationMessage = document.getElementById('city-error');

                        if (!cityRegex.test(cityInput.value)) {
                            validationMessage.innerHTML = 'Invalid city name!';
                            cityInput.value = '';
                            cityInput.classList.add('is-invalid');
                            element.focus();
                            isValid = false;
                            console.log('city');
                        }
                    }


                }

                console.log(isValid);

                return isValid;
            }

            document.querySelector('#submit_button').addEventListener('click', function(event) {
                // event.preventDefault(); 

                var isValid = validateForm();

                if (isValid) {
                    console.log('Form Entries are Valid,  you will be redirected to home page.');
                    // var orderConfirmationModal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
                    // orderConfirmationModal.show();
                    // document.getElementById('checkoutForm').reset();
                }





                // window.location.href = "{{ route('index') }}";

                // setTimeout(function() {
                //     console.log('It is Valid.');
                //     var orderConfirmationModal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
                //     orderConfirmationModal.show();
                // }, 1000); // Adjust the delay as needed (in milliseconds)



            });





            // document.querySelector('#submit_button').addEventListener('click', function(event) {
            //     event.preventDefault();
            //     var isValid = validateForm();

            //     if (isValid) {
            //         fetch('/send-order-confirmation-email', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //             },
            //             body: JSON.stringify({ email: document.getElementById('email').value })
            //         })
            //         .then(response => {
            //             if (response.ok) {
            //                 console.log('Email sent successfully');
            //             } else {
            //                 console.error('Error sending email');
            //             }
            //         });

            //         var orderConfirmationModal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
            //         orderConfirmationModal.show();

            //         document.getElementById('checkoutForm').reset();
            //     }
            // });



        });
    </script>



    <script>
        // Add this code after the redirect code
    </script>



</body>

</html>