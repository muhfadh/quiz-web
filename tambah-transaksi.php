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
    <link rel="stylesheet" type="text/css" href="css/tambah.css">
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="tambah">
        <div class="tambah-screen">
            <div class="app-title">
                <h1>Tambah Data Transaksi</h1>
            </div>

            <div class="tambah-form">
                <div class="control-group">
                    <label for="kd_brg"></label>
                    <input type="text" name="kd_brg" id="kd_brg" placeholder="Kode Barang" required>
                </div>
                <div class="control-group">
                    <label for="kd_pembeli"></label>
                    <input type="text" name="kd_pembeli" id="kd_pembeli" placeholder="Kode Pembeli" required>
                </div>

                <button type="submit" name="submit" class="button">Tambah Data Transaksi</button>
                    
            </div>
        </div>
    </div>
    </form>
</body>
</html>