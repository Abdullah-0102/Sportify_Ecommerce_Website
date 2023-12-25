<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Signup Form</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <!-- <div class="heading">
        <h1>ADMIN LOGIN</h1>
    </div> -->
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form id="loginForm">
        <h3>Welcome Back!
            <span>Login to your account.</span>
        </h3>

        <label for="username">Username</label>
        <input type="text" id="username">

        <label for="password">Password</label>
        <input type="password" id="password">

        <button type="button" id="sign-in">Sign In</button>

    </form>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
