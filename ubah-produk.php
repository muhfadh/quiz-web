<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data di url
$kd_brg = $_GET["kd_brg"];

//query data berdasar id
$produk = query("SELECT * FROM barang WHERE kd_brg = $kd_brg")[0];

//cek tombol submit
if(isset($_POST["submit"])){  
    //cek apakah data berhasil ditambah
    if(ubahProduk($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'produk.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data gagal diubah');
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
    <title>Ubah Data Produk</title>
</head>
<body>
    <h1>Ubah Data Produk</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="kd_brg" value="<?= $produk["kd_brg"];?>">
        <ul>
            <li>
                <label for="nm_barang">Nama Barang : </label>
                <input type="text" name="nm_barang" id="nm_barang" required value="<?= $produk["nm_barang"]; ?>">
            </li>
            <li>
                <label for="merk">merk : </label>
                <input type="text" name="merk" id="merk" required value="<?= $produk["merk"]; ?>">
            </li>
            <li>
                <label for="tipe">tipe : </label>
                <input type="text" name="tipe" id="tipe" required value="<?= $produk["tipe"]; ?>">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" required value="<?= $produk["harga"]; ?>">
            </li>
            <li>
                <label for="stok">Stok : </label>
                <input type="text" name="stok" id="stok" required value="<?= $produk["stok"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>