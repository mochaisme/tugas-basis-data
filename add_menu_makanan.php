<?php
session_start();
include 'db_conn.php';

if (isset($_POST["tambah_makanan"])) {
    $nama_makanan = $_POST["nama_makanan"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $lokasi = $_POST["lokasi"];
    $id_user = $_SESSION["id"];

    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_path = "upload/" . $gambar;

    move_uploaded_file($gambar_tmp, $gambar_path);

    $query = "INSERT INTO menu_makanan (nama_makanan, harga, deskripsi, gambar, lokasi, id_user) 
              VALUES ('$nama_makanan', $harga, '$deskripsi', '$gambar_path', '$lokasi', '$id_user')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header ("Location: home.php");
        echo "<h2>Menu makanan berhasil ditambahkan</h2>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
