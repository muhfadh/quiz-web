<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

require 'functions.php';

//ambil data di url
$kd_pembeli = $_GET["kd_pembeli"];

//query data berdasar id
$customer = query("SELECT * FROM pembeli WHERE kd_pembeli = $kd_pembeli")[0];

//cek tombol submit
if(isset($_POST["submit"])){  
    //cek apakah data berhasil ditambah
    if(ubahCustomer($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'customer.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data gagal diubah');
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
    <title>Ubah Data Customer</title>
    <link rel="stylesheet" type="text/css" href="css/ubah.css">
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="kd_pembeli" value="<?= $customer["kd_pembeli"];?>">
    <div class="ubah">
        <div class="ubah-screen">
            <div class="app-title">
                <h1>Ubah Data Custmoer</h1>
            </div>

            <div class="ubah-form">
                <div class="control-group">
                    <label for="nm_pembeli">Nama Pembeli</label>
                    <input type="text" name="nm_pembeli" id="nm_pembeli" required value="<?= $customer["nm_pembeli"]; ?>">
                </div>  

                <div class="control-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $customer["jenis_kelamin"]; ?>">
                </div> 

                <div class="control-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" required value="<?= $customer["alamat"]; ?>">
                </div> 

                <div class="control-group">
                    <label for="kota">kota : </label>
                    <input type="text" name="kota" id="kota" required value="<?= $customer["kota"]; ?>">
                </div> 
                
                <button type="submit" name="submit" class="button">Ubah Data</button>
            </div>   
        </div>
    </div>
    </form>
</body>
</html>