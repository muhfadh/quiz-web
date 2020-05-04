<?php
    require '../functions.php';
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM barang 
    WHERE 
    nm_barang LIKE '%$keyword%' OR
    merk LIKE '%$keyword%' OR
    tipe LIKE '%$keyword%' OR
    harga LIKE '%$keyword%' OR
    stok LIKE '%$keyword%'
    ";
    $produk = query($query);
    
?>

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
                    <a href="ubah-produk.php?id=<?= $row["kd_brg"]; ?>">ubah</a> | 
                    <a href="hapus-produk.php?id=<?= $row["kd_brg"]; ?>" onclick="return confirm('yakin?');">hapus</a>
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