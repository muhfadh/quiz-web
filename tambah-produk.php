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
    if(tambahProduk($_POST) > 0){
        echo "
            <script>
                alert('Produk berhasil ditambahkan');
                document.location.href = 'produk.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Produk gagal ditambahkan');
                document.location.href = 'produk.php';
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
    <title>Tambah Data Produk</title>
    <link rel="stylesheet" type="text/css" href="css/tambah.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="tambah">
        <div class="tambah-screen">
            <div class="app-title">
                <h1>Tambah Data Produk</h1>
            </div>

            <div class="tambah-form">
                <div class="control-group">
                        <input type="text" name="nm_barang" id="nm_barang" placeholder="Nama Barang" required>
                        <label for="nm_barang"></label>
                </div>
                <div class="control-group">
                        <label for="merk"></label>
                        <input type="text" name="merk" id="merk" placeholder="Merk Barang"  required>
                </div>
                <div class="control-group">
                        <label for="tipe"></label>
                        <input type="text" name="tipe" id="tipe" placeholder="Tipe Barang"  required>
                </div>    
                <div class="control-group">
                        <label for="harga"></label>
                        <input type="text" name="harga" id="harga" placeholder="Harga Barang" required>
                </div>   
                <div class="control-group">
                        <label for="stok"></label>
                        <input type="text" name="stok" id="stok" placeholder="Stok Barang"  required>
                </div>
                    
                <button type="submit" name="submit" class="button">Tambah Data Produk</button>
                    
            </div>
        </div>
    </div>
    </form>
</body>
</html>