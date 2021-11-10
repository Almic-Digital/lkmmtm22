<?php
require 'api/connect.php';

if (isset($_GET['stat'])) {
    if ($_GET['stat'] == 1) {
        echo "<script>alert('NRP dan password salah! Silahkan coba lagi.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LKMM-TM 2022 - Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/login.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <link rel="icon" href="asset/ITEM/icon-item.png">
</head>

<body class="text-center" data-new-gr-c-s-check-loaded="14.986.0" data-gr-ext-installed="">
    <main class="form-signin">
        <form action="api/ceklogin.php" method="POST">
            <img class="mb-4" src="asset/ITEM/item2.png" alt="Item-jaya2021" width="140">
            <h1 class="h3 mb-3 fw-normal">Login Portal</h1>
            <label for="nrp" class="visually-hidden">Nrp</label>
            <input type="nrp" name="nrp" id="nrp" class="form-control" placeholder="Ex: c141901xxx" required="">
            <label for="password" class="visually-hidden">Password</label>
            <input type="password" id="password" name="pass" class="form-control" placeholder="Password" required="">
            <button class="w-100 btn btn-lg btn-primary" id="login-button" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2020-2021</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>
</body>

</html>