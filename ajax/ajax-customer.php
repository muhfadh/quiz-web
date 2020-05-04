<?php
    require '../functions.php';
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM pembeli 
    WHERE 
    nm_pembeli LIKE '%$keyword%' OR
    jenis_kelamin LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    kota LIKE '%$keyword%'
    ";
    $customer = query($query);
    
?>
<table class="tabelkuh">
        <thead>
            <tr>
                <th>Aksi</th>
                <th>Nama Customer</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kota</th>
            </tr>
        </thead>
        <?php foreach($customer as $row) : ?>
        <tbody>
            <tr>
                <td>
                    <a href="ubah-customer.php?kd_pembeli=<?= $row["kd_pembeli"]; ?>">ubah</a> | 
                    <a href="hapus-customer.php?kd_pembeli=<?= $row["kd_pembeli"]; ?>" onclick="return confirm('yakin?');">hapus</a>
                </td>
                <td><?= $row["nm_pembeli"] ?></td>
                <td><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td><?= $row["kota"] ?></td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table>
