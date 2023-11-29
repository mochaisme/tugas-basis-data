<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include 'db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Hello, <?php echo $_SESSION['name']; ?></h1>

    <!-- Menampilkan Menu Makanan -->
    <h2>Menu Makanan</h2>
    <?php include 'display_menu_makanan.php'; ?>
   

    <!-- Form Tambah Menu Makanan -->
    <h2>Tambah Menu Makanan</h2>
    <form action="add_menu_makanan.php" method="POST" enctype="multipart/form-data">
        Nama Makanan: <input type="text" name="nama_makanan"><br>
        Harga: <input type="text" name="harga"><br>
        Deskripsi dan Kontak: <textarea name="deskripsi"></textarea><br>
        Gambar: <input type="file" name="gambar"><br>
        Lokasi Penjualan: <input type="text" name="lokasi"><br>
        <input type="submit" name = "tambah_makanan" value="Tambahkan Menu Makanan">
    </form>
    
    <a href="logout.php">Logout</a>
    
</body>
</html>

<?php 
} else {
    header("Location: index.php");
    exit();
}
?>
