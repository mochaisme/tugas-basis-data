<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_menu = $_POST["id_menu"];
    $nama_makanan = $_POST["nama_makanan"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $lokasi = $_POST["lokasi"];

    $query = "UPDATE menu_makanan SET nama_makanan='$nama_makanan', harga=$harga, deskripsi='$deskripsi', lokasi='$lokasi' WHERE id_menu=$id_menu";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: home.php");
        exit(); // Pastikan untuk keluar setelah mengarahkan ulang
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    // Menampilkan formulir edit menu makanan
    $id_menu = $_GET["id"];
    $query = "SELECT * FROM menu_makanan WHERE id_menu=$id_menu";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $menu = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu Makanan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Edit Menu Makanan</h2>
    <form action="edit_menu_makanan.php" method="post">
        <input type="hidden" name="id_menu" value="<?php echo $menu["id_menu"]; ?>">
        Nama Makanan: <input type="text" name="nama_makanan" value="<?php echo $menu["nama_makanan"]; ?>"><br>
        Harga: <input type="text" name="harga" value="<?php echo $menu["harga"]; ?>"><br>
        Deskripsi dan Kontak: <textarea name="deskripsi"><?php echo $menu["deskripsi"]; ?></textarea><br>
        Lokasi Penjualan: <input type="text" name="lokasi" value="<?php echo $menu["lokasi"]; ?>"><br>
        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>
<?php
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
