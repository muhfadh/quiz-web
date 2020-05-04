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
</head>
<body>
    <h1>Tambah Data Produk</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nm_barang">Nama Barang : </label>
                <input type="text" name="nm_barang" id="nm_barang" required>
            </li>
            <li>
                <label for="merk">Merk Barang : </label>
                <input type="text" name="merk" id="merk" required>
            </li>
            <li>
                <label for="tipe">Tipe Barang : </label>
                <input type="text" name="tipe" id="tipe" required>
            </li>
            <li>
                <label for="harga">harga Barang : </label>
                <input type="text" name="harga" id="harga" required>
            </li>
            <li>
                <label for="stok">stok Barang : </label>
                <input type="text" name="stok" id="stok" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data Produk</button>
            </li>
        </ul>
    </form>
</body>
</html>