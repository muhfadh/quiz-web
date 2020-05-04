<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "datatoko");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

// PRODUK
function tambahProduk($data){
    global $conn;
    $nm_barang = htmlspecialchars($data["nm_barang"]);
    $merk = htmlspecialchars($data["merk"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);

    //query insert data
    $query = "INSERT INTO barang 
                VALUES ('','$nm_barang','$merk','$tipe','$harga','$stok')
            ";
    mysqli_query($conn, $query );

    return mysqli_affected_rows($conn);
}

function hapusProduk($kd_brg){
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE kd_brg = $kd_brg");
    return mysqli_affected_rows($conn);
}

function ubahProduk($data){
    global $conn;
    $kd_brg = $data["kd_brg"];
    $nm_barang = htmlspecialchars($data["nm_barang"]);
    $merk = htmlspecialchars($data["merk"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);;

    //query update data
    $query = "UPDATE barang SET
                nm_barang = '$nm_barang',
                merk = '$merk',
                tipe = '$tipe',
                harga = '$harga',
                stok = '$stok'
            WHERE kd_brg = $kd_brg
            ";
    mysqli_query($conn, $query );

    return mysqli_affected_rows($conn);
}

function cariProduk($keyword){
    $query = "SELECT * FROM barang 
    WHERE 
    nm_barang LIKE '%$keyword%' OR
    merk LIKE '%$keyword%' OR
    tipe LIKE '%$keyword%' OR
    harga LIKE '%$keyword%' OR
    stok LIKE '%$keyword%'
    ";

    return query($query);
}

// CUSTOMER
function tambahCustomer($data){
    global $conn;
    $nm_pembeli = htmlspecialchars($data["nm_pembeli"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kota = htmlspecialchars($data["kota"]);

    //query insert data
    $query = "INSERT INTO pembeli 
                VALUES ('','$nm_pembeli','$jenis_kelamin','$alamat','$kota')
            ";
    mysqli_query($conn, $query );

    return mysqli_affected_rows($conn);
}

function hapusCustomer($kd_pembeli){
    global $conn;
    mysqli_query($conn, "DELETE FROM pembeli WHERE kd_pembeli = $kd_pembeli");
    return mysqli_affected_rows($conn);
}

function ubahCustomer($data){
    global $conn;
    $kd_pembeli = $data["kd_pembeli"];
    $nm_pembeli = htmlspecialchars($data["nm_pembeli"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $kota = htmlspecialchars($data["kota"]);

    //query update data
    $query = "UPDATE pembeli SET
                nm_pembeli = '$nm_pembeli',
                jenis_kelamin = '$jenis_kelamin',
                alamat = '$alamat',
                kota = '$kota'
            WHERE kd_pembeli = $kd_pembeli
            ";
    mysqli_query($conn, $query );

    return mysqli_affected_rows($conn);
}

function cariCustomer($keyword){
    $query = "SELECT * FROM pembeli 
    WHERE 
    nm_pembeli LIKE '%$keyword%' OR
    jenis_kelamin LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    kota LIKE '%$keyword%'
    ";

    return query($query);
}


//TRANSAKSI
function tambahTransaksi($data){
    global $conn;
    $kd_brg = htmlspecialchars($data["kd_brg"]);
    $kd_pembeli = htmlspecialchars($data["kd_pembeli"]);
    $tgl_beli = date("Y-m-d H:i:s");
    //query insert data
    $query = "INSERT INTO transaksi 
                VALUES ('','$kd_brg','$kd_pembeli','$tgl_beli')
            ";
    mysqli_query($conn, $query );

    return mysqli_affected_rows($conn);
}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username udh ada blm
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "  <script>
                        alert('Username sudah terdaftar!');
                </script>"; 
        return false;
    }

    //cek konfirmasi password

    if($password !== $password2){
        echo "  <script>
                        alert('Konfirmasi Password tidak sesuai');
                </script>";
        return false;
    }
    
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
    

}

?>