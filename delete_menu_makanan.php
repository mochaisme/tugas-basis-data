<?php
session_start();
include 'db_conn.php';

if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];

    // Lakukan penghapusan menu
    $query = "DELETE FROM menu_makanan WHERE id_menu=$id_menu";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: home.php");
        exit(); // Pastikan untuk keluar setelah mengarahkan ulang
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID menu tidak valid";
}

mysqli_close($conn);
?>
