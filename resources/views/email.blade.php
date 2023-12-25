<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>

    <p>Thank you for buying from us! We will start processing your order right away.
        When your order is shipped, you will receive an email with the shipment details so that you can track your order. <br>
        In the meantime, if you have any queries, you can mail us at <strong>sportifywear2@gmail.com</strong> <br> Have a nice day, cheers!</p>



    @php
    $cartItems = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    @endphp
    <!-- <h2>Order Confirmed</h2> -->
    <p>Order Details:</p>
    @if(count($cartItems) > 0)
    <ul>
        <?php $sum = 0; ?> <!-- Initialize sum variable outside the loop -->
        @foreach($cartItems as $index => $item)
        <?php $sum = $sum + $item['price']*$item['quantity']; ?> <!-- Calculate sum inside the loop -->
        <li><strong>{{ $item['name'] }} : Rs. {{ $item['price'] }}</strong>
            <p>Quantity : {{ $item['quantity'] }}, Size : {{ $item['size'] }}</p>
        </li>
        <br>
        @endforeach
    </ul>

    <h4>Total: Rs. {{ $sum }}</h4>

    <hr>
    @else
    <p>You have bought no items.</p>
    @endif
</body>

</html>