<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $platformID = $_POST['platform'];
    $genreID = $_POST['genre'];
    $namaGame = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $komentar = $_POST['komentar'];
    $rating = $_POST['rating'];

    
    if (isset($platformID) && isset($genreID)){
        $stmt = $conn->prepare("INSERT INTO game (platformID, genreID, nama, deskripsi, komentar, rating) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssi", $platformID, $genreID, $namaGame, 
                        $deskripsi, $komentar, $rating);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../ui/db.php");
        }else{
            echo "Error: " . $stmt->error;
            $stmt->close();
            exit();
        }
    }
}
?>