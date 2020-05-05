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
    <link rel="stylesheet" type="text/css" href="css/tambah.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="tambah">
        <div class="tambah-screen">
            <div class="app-title">
                <h1>Tambah Data Customer</h1>
            </div>

            <div class="tambah-form">
                <div class="control-group">
                    <label for="nm_pembeli"></label>
                    <input type="text" name="nm_pembeli" id="nm_pembeli" placeholder="Nama Customer" required>
                </div>
                <div class="control-group">
                    <label for="jenis_kelamin"></label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" required>
                </div>
                <div class="control-group">
                    <label for="alamat"></label>
                    <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
                </div>    
                <div class="control-group">
                    <label for="kota"></label>
                    <input type="text" name="kota" id="kota" placeholder="Kota" required>
                </div>                  
                <button type="submit" name="submit" class="button">Tambah Data Customer</button>
                    
            </div>
        </div>
    </div>
    </form>
</body>
</html>