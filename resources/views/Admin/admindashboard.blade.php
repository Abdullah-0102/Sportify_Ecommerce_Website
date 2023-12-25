<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link rel="icon" href="{{asset('assets/favicon.png')}}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <title>Admin Dashboard</title>
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


        .centered-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .centered-content img {
            max-width: 100%;
            height: 50%;
        }

        .page-title {
            font-size: 40px;
            font-weight: bold;
            margin: 0;
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
    <nav class="navbar navbar-expand-lg navigation bg-dark">
        <!-- Logo on the left -->
        <a class="navbar-brand d-flex align-self-center pl-2 mx-2 mr-auto" href="{{ asset('index') }}">
            <img class="logo" src="{{ asset('assets/white-logo.png') }}" alt="Sportify Wear" style="width: 150px; height: auto;">
        </a>
    </nav>

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

            <!-- Centered Image and Text on the right -->
            <div class="col-md-9 centered-content">
                <div class="page-title">SPORTIFY WEAR</div>
                <div class="page-subtitle">ADMIN PANEL DASHBOARD</div>
                <img src="{{ asset('assets/grey-logo.png') }}" alt="Sportify Wear Image">
            </div>
        </div>
    </div>
</body>

</html>