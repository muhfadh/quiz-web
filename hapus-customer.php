<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
    require 'functions.php';

    $kd_pembeli = $_GET["kd_pembeli"];

    if(hapusCustomer($kd_pembeli) > 0){
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'customer.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'customer.php';
            </script>
        ";
    }
?>