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
    if(tambahTransaksi($_POST) > 0){
        echo "
            <script>
                alert('transaksi berhasil ditambahkan');
                document.location.href = 'transaksi.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('transaksi gagal ditambahkan');
                document.location.href = 'transaksi.php';
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
    <title>Tambah Data Transaksi</title>
</head>
<body>
    <h1>Tambah Data Transaksi</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="kd_brg">Kode Barang : </label>
                <input type="text" name="kd_brg" id="kd_brg" required>
            </li>
            <li>
                <label for="kd_pembeli">Kode Pembeli : </label>
                <input type="text" name="kd_pembeli" id="kd_pembeli" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data Transaksi</button>
            </li>
        </ul>
    </form>
</body>
</html>