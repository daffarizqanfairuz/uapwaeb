<?php
include '../db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gameID = $_POST['gameID'];
    $platformID = $_POST['platform'];
    $genreID = $_POST['genre'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $komentar = $_POST['komentar'];
    $rating = $_POST['rating'];

    $updateSQL = "UPDATE game SET 
                  platformID = '$platformID', 
                  genreID = '$genreID', 
                  nama = '$nama', 
                  deskripsi = '$deskripsi', 
                  komentar = '$komentar', 
                  rating = '$rating' 
                  WHERE gameID = '$gameID'";

    if ($conn->query($updateSQL) === TRUE) {
        header("Location: ../ui/db.php");
    } else {
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }
}

$conn->close();
?>