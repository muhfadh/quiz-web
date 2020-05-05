<?php 
session_start();
if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$produk = query("SELECT * FROM barang");

//tombol cari diklik
if(isset($_POST["cari"])){
    $produk = cariProduk($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Halaman Produk</h1>
    <div class="header">
        <div class="navbar">
            <ul>
                <li><a href="index.php" class="link">Home</a></li>
                    <li><a href="produk.php" class="link">Product</a></li>
                    <li><a href="customer.php" class="link">Customer</a></li>
                    <li><a href="transaksi.php" class="link">Transaction</a></li>
            </ul>   
        </div>

        <form action="" method="POST">
            <input type="text" id="keyword" class="textbox" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian ..." autocomplete="off">
            <button type="submit" class="button" name="cari" id="tombol-cari">Cari</button> <br>
        </form>
    </div>
    
    <a href="tambah-produk.php" class="tambah">
        +
    </a>
    <a href="logout.php" class="logout">
        <!-- <i class="fa fa-home"></i> -->
        <i class="fa fa-close"></i>
    </a>
    <br><br>
    <br>
<!-- 
    border="1" cellpadding="10" cellspacing="0" -->
    <table class="tabelkuh">
        <thead>
            <tr>
                <th>kode</th>
                <th>Aksi</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <?php foreach($produk as $row) : ?>
        <tbody>
            <tr>
                <td><?= $row["kd_brg"]; ?></td>
                <td>
                    <a href="ubah-produk.php?kd_brg=<?= $row["kd_brg"]; ?>">ubah</a> | 
                    <a href="hapus-produk.php?kd_brg=<?= $row["kd_brg"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><?= $row["nm_barang"] ?></td>
                <td><?= $row["merk"] ?></td>
                <td><?= $row["tipe"] ?></td>
                <td><?= $row["harga"] ?></td>
                <td><?= $row["stok"] ?></td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>