<?php
    session_start();
    if( isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
    require 'functions.php';

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $result = mysqli_query($conn, "SELECT * FROM user 
                                WHERE username = '$username' ");

        //cek username
        if( mysqli_num_rows($result) === 1 ){

            //cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"])){
                //set session
                $_SESSION["login"] = true;
                
                header("Location: index.php");
                exit;
            }
        }
        
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    
    <form action="" method="POST">

    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1>
            </div>

            <div class="login-form">
                <div class="control-group">
                    <input type="text" name="username" class="login-field" value="" placeholder="Username">
                    <label class="login-field-icon fui-user" for="username"></label>
                </div>

                <div class="control-group">
                    <input type="password" name="password" class="login-field" value="" placeholder="Password">
                    <label class="login-field-icon fui-lock" for="password"></label>
                </div>

                <button type="submit" name="login" class="button">Login</button>
                <a class="login-link" href="registrasi.php">Belum punya akun?</a>
                <?php if(isset($error)) : ?>
                    <p style="color: red;"> username / password salah </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </form>
</body>
</html>