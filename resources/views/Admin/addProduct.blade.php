<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Manually include CSRF token meta tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Form Contact Us</title>
    <link rel="stylesheet" href="{{asset('css/addItem.css')}}">
</head>

<body>
    <div class="container" style="background: url('{{ asset('assets/bg.png') }}') no-repeat center center/cover;">
        <section>
            <h1>ADD YOUR PRODUCT</h1>
            <div class="row">
                <div class="col ">
                    <input type="text" name="p_title" id="firstName" placeholder="Product Title" required>
                </div>
                <div class="col">
                    <input type="text" id="lastName" placeholder="Product Brand" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="number" id="email" placeholder="Price" required>
                </div>
                <div class="col">
                    <input type="number" id="mobile" placeholder="Quantity" required>
                </div>
            </div>

            <div class="row">
                <div class="col" style="min-width: 230px; max-width: 230px;">
                    <input type="text" id="color-name" placeholder="Color Name">
                </div>
                <div class="col" style="min-width: 250px; max-width: 250px;">
                    <input type="text" id="color-code" placeholder="Hex Code" style="margin: 0 0 10px 20px;">
                </div>
            </div>

            <div class="row w-75">
                <div class="col d-flex justify-content-center align-items-center">
                    <button class="btn btn-outline-light h-50" id="add-color">Add Color</button>
                </div>
                <div class="col">
                    <label for="product-category">Category:</label>
                    <select id="product-category" name="product-category">
                        <option value="hoodies">Hoodies</option>
                        <option value="shirts">Shirts</option>
                        <option value="trousers">Trousers</option>
                    </select>
                </div>
            </div>

            <div class="row w-75 mt-3">
                <div class="col d-flex justify-content-start ml-5 mt-2">
                    <form action="/insert" method="post" id="hidden_form" enctype="multipart/form-data">
                        <input type="file" name='p_img'>
                    </form>
                </div>
            </div>




            <!-- Dialog for associating color with sizes -->
            <div id="size-dialog" style="display: none;">
                <h3>Select Sizes for Color:</h3>
                <div id="size-checkboxes">
                    <!-- Checkboxes for sizes will be populated dynamically -->
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h4 class="d-flex justify-content-center mt-1"><strong>Product
                            Description...</strong></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <textarea placeholder="Sportify Products description" name="description" required></textarea>
                </div>
                <div class="col">
                    <input class="btn btn-outline-light" type="submit" value="Send" id="button">
                </div>
            </div>
</section>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/addItem.js') }}"></script>

</body>

</html>