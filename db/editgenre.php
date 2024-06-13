<?php
include '../db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genreID = $_POST['genreID'];
    $nama = $_POST['genre'];

    $updateSQL = "UPDATE genre SET nama = '$nama' WHERE genreID = '$genreID'";

    if ($conn->query($updateSQL) === TRUE) {
        header("Location: ../ui/dbgenre.php");
    } else {
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }
}

$conn->close();
?>