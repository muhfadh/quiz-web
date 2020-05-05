<?php 
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$transaksi = query("SELECT t.kd_trx, t.tgl_beli, concat(concat(p.nm_pembeli, ' - '), p.kota) AS pembeli, concat(concat(b.nm_barang, ' - '), b.tipe) AS barang, b.harga FROM transaksi t INNER JOIN barang b ON t.kd_brg=b.kd_brg INNER JOIN pembeli p ON t.kd_pembeli=p.kd_pembeli");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Halaman Transaksi</h1>
    <div class="header">
        <div class="navbar">
            <ul>
                <li><a href="index.php" class="link">Home</a></li>
                    <li><a href="produk.php" class="link">Product</a></li>
                    <li><a href="customer.php" class="link">Customer</a></li>
                    <li><a href="transaksi.php" class="link">Transaction</a></li>
            </ul>   
        </div>
    </div>
    
    <a href="tambah-transaksi.php" class="tambah">
        +
    </a>
    <a href="logout.php" class="logout">
        <i class="fa fa-close"></i>
    </a>
    <br><br>
    <br>
    <table class="tabelkuh">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Tanggal Pembelian</th>
                <th>Detail Pembeli</th>
                <th>Detail Barang</th>
                <th>Harga Barang</th>
            </tr>
        </thead>
        <?php foreach($transaksi as $row) : ?>
        <tbody>
            <tr>
                <td><?= $row["kd_trx"] ?></td>
                <td><?= $row["tgl_beli"] ?></td>
                <td><?= $row["pembeli"] ?></td>
                <td><?= $row["barang"] ?></td>
                <td><?= $row["harga"] ?></td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>