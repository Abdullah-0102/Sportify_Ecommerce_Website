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

    <!-- <h2>Order Confirmed</h2> -->
    <p>Order Details:</p>
    <ul>
        <li>Product 1: Rs. 2,500</li>
        <li>Product 2: Rs. 3,000</li>
        <!-- Add more product details as needed -->
    </ul>

    <p>Total: Rs. 5,500</p>
</body>
</html>
