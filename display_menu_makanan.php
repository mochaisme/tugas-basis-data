<?php
include 'db_conn.php';

$query = "SELECT * FROM menu_makanan";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2 style='color:blue;'>" . $row["nama_makanan"] . "</h2>";
            echo "<p>Harga: Rp " . number_format($row["harga"], 2) . "</p>";
            echo "<p>Deskripsi: " . $row["deskripsi"] . "</p>";
            echo "<img src='" . $row["gambar"] . "' alt='" . $row["nama_makanan"] . "'><br>";
            echo "<p>Lokasi Penjualan: " . $row["lokasi"] . "</p>";
            
            
            echo "<a href='edit_menu_makanan.php?id=" . $row["id_menu"] . "'>Edit</a> | ";
            echo "<a href='delete_menu_makanan.php?id=" . $row["id_menu"] . "'>Hapus</a><hr>";
            
        }
    } else {
        echo "Tidak ada menu makanan yang tersedia.";
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>