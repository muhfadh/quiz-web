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
    <link rel="stylesheet" type="text/css" href="css/ubah.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="kd_brg" value="<?= $produk["kd_brg"];?>">
    <div class="ubah">
        <div class="ubah-screen">
            <div class="app-title">
                <h1>Ubah Data Produk</h1>
            </div>

            <div class="ubah-form">
                <div class="control-group">
                    <label for="nm_barang">Nama Barang</label>
                    <input type="text" name="nm_barang" id="nm_barang" required value="<?= $produk["nm_barang"]; ?>">
                </div>  

                <div class="control-group">
                    <label for="merk">merk : </label>
                    <input type="text" name="merk" id="merk" required value="<?= $produk["merk"]; ?>">
                </div> 

                <div class="control-group">
                    <label for="tipe">tipe : </label>
                    <input type="text" name="tipe" id="tipe" required value="<?= $produk["tipe"]; ?>">
                </div> 

                <div class="control-group">
                    <label for="harga">Harga : </label>
                    <input type="text" name="harga" id="harga" required value="<?= $produk["harga"]; ?>">
                </div> 

                <div class="control-group">
                    <label for="stok">Stok : </label>
                    <input type="text" name="stok" id="stok" required value="<?= $produk["stok"]; ?>">
                </div> 

                <button type="submit" name="submit" class="button">Ubah Data</button>
            </div>   
        </div>
    </div>
    </form>
</body>
</html>