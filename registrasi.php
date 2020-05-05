<?php
require 'functions.php';

    if(isset($_POST["register"])){
        if(registrasi($_POST)> 0){
            echo "  <script>
                        alert('User baru berhasil ditambahkan');
                    </script>";
        }
        else{
            echo mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">

        <div class="register">
            <div class="register-screen">
                <div class="app-title">
                <h1>Registrasi</h1>
        
            <div class="register-form">
                <div class="control-group">
                <label for="username"></label>
                <input type="text" name="username" id="username" class="register-form" placeholder="Username">
              </div>
            
            <div class="control-group">  
                <label for="password"></label>
                <input type="password" name="password" id="password" class="register-form" placeholder="Password">
                </div>
            
            
            <div class="control-group">
                <label for="password2"></label>
                <input type="password" name="password2" id="password2" class="register-form" placeholder="Konfirmasi Password">
                </div>
            
                <button type="submit" name="register" class="button">Daftar</button>
                <a class="login-link" href="login.php">Sudah punya akun?</a>
           
            
        
    </form>
</body>
</html>