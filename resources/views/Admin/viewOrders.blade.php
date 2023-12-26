<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">



    <link rel="icon" href="{{asset('assets/favicon.png')}}">

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

        @if(session('fulfilledsuccess'))
        <div class="alert alert-success">
            {{ session('fulfilledsuccess') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-3 admin-panel">
                <h3 id="dashboardLink">DASHBOARD</h3>
                <ul>
                    <li><a href="{{ route('addProduct') }}">Add Product</a></li>
                    <li><a href="{{ route('delprods') }}">Delete Product</a></li>
                    <!-- <li><a href="#">Edit Product</a></li> -->
                    <!-- <li><a href="#">View inventory</a></li> -->
                    <li><a href="{{ route('client_orders') }}">Client Orders</a></li>
                    <li><a href="{{ route('client_queries') }}">View Complaints</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="container mt-5">
                    <h2>Order Details</h2>

                    @if(session('ordersuccess'))
                    <div class="alert alert-success">
                        {{ session('ordersuccess') }}
                    </div>
                    @endif


                    @if($clientOrders->isEmpty())
                    <div class="d-flex justify-content-center">NO ORDERS TO DISPLAY.</div>
                    @else
                    <!-- Display Client Information -->
                    @foreach($clientOrders as $clientOrder)
                    <div class="card mt-4">
                        <div class="card-header">
                            Client Information
                        </div>
                        <div class="card-body">
                            <p><strong>First Name:</strong> {{ $clientOrder->first_name }}</p>
                            <p><strong>Last Name:</strong> {{ $clientOrder->last_name }}</p>
                            <p><strong>Contact:</strong> {{ $clientOrder->contact_no }}</p>
                            <p><strong>Email:</strong> {{ $clientOrder->email }}</p>
                            <p><strong>Address:</strong> {{ $clientOrder->address }}</p>
                            <p><strong>City:</strong> {{ $clientOrder->city }}</p>
                            <p><strong>Country:</strong> {{ $clientOrder->country }}</p>
                            <p><strong>Zip:</strong> {{ $clientOrder->zip }}</p>
                        </div>
                    </div>

                    <!-- Display Order Information -->
                    <div class="card mt-4">
                        <div class="card-header">
                            Order Information
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                @foreach ($cart as $cartItem)
                                    @if ($cartItem->order_id == $clientOrder->id)
                                    <p><strong>Product ID:</strong> {{ $cartItem->p_id }}</p>
                                    <p><strong>Quantity:</strong> {{ $cartItem->quantity }}</p>
                                    <p><strong>Color:</strong> {{ $cartItem->color }}</p>
                                    <p><strong>Size:</strong> {{ $cartItem->size }}</p>
                                    <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('dashboardLink').addEventListener('click', function() {
            window.location.href = "{{ route('dashboard') }}";
        });

        function noteRow($id) {
            // var url = '/deleteClientQuery/' + clientQueryId;
            window.location.href = "/deleteClientQuery/" + $id;
        }
    </script>

</body>

</html>