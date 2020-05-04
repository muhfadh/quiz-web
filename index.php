<?php 
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>SELAMAT DATANG DI WEBSITE KAMI</h1>
    <div class="header">
        <div class="navbar">
            <ul>
                <li><a href="index.php" class="link">Home</a></li>
                    <li><a href="produk.php" >Product</a></li>
                    <li><a href="customer.php" >Customer</a></li>
                    <li><a href="transaksi.php" >Transaction</a></li>
            </ul>   
        </div>
    </div>
    
    <a href="logout.php" class="logout">
        <!-- <i class="fa fa-home"></i> -->
        <i class="fa fa-close"></i>
    </a>
    <br><br>
    

    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>