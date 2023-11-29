<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_menu = $_POST["id_menu"];
    $nama_makanan = $_POST["nama_makanan"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $lokasi = $_POST["lokasi"];

    // Proses jika gambar diubah
    if ($_FILES["gambar"]["name"] != "") {
        $gambar = $_FILES["gambar"]["name"];
        $gambar_tmp = $_FILES["gambar"]["tmp_name"];
        $gambar_path = "upload/" . $gambar;

        move_uploaded_file($gambar_tmp, $gambar_path);

        $query = "UPDATE menu_makanan SET 
                  nama_makanan = '$nama_makanan', 
                  harga = $harga, 
                  deskripsi = '$deskripsi', 
                  gambar = '$gambar_path', 
                  lokasi = '$lokasi' 
                  WHERE id_menu = $id_menu";
    } else {
        // Proses jika gambar tidak diubah
        $query = "UPDATE menu_makanan SET 
                  nama_makanan = '$nama_makanan', 
                  harga = $harga, 
                  desk
