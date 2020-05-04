<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
//cek tombol submit
if(isset($_POST["submit"])){  
    //cek apakah data berhasil ditambah
    if(tambahCustomer($_POST) > 0){
        echo "
            <script>
                alert('customer berhasil ditambahkan');
                document.location.href = 'customer.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('customer gagal ditambahkan');
                document.location.href = 'customer.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Customer</title>
</head>
<body>
    <h1>Tambah Data Customer</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nm_pembeli">Nama Customer : </label>
                <input type="text" name="nm_pembeli" id="nm_pembeli" required>
            </li>
            <li>
                <label for="jenis_kelamin">Jenis Kelamin : </label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required>
            </li>
            <li>
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="kota">Kota : </label>
                <input type="text" name="kota" id="kota" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data Produk</button>
            </li>
        </ul>
    </form>
</body>
</html>