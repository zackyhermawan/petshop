<?php
require "database.php";

if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($db, "SELECT * from users where username = '$username' and password = '$password'");

    if($login->num_rows > 0){
        $_SESSION['username'] = $username;
        header('location:data-product.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="overflow-y:hidden;">
<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
    <div class="card card-login border-0 col-4 shadow-lg bg-light p-3">
        <h3 class="text-center mb-4">Login Dashboard</h3>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
            <br>
        
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            <br>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>