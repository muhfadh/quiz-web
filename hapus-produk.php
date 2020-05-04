<?php
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
    require 'functions.php';

    $kd_brg = $_GET["kd_brg"];

    if(hapusProduk($kd_brg) > 0){
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'produk.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'produk.php';
            </script>
        ";
    }
?>