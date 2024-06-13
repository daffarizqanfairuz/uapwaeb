<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $genre = $_POST['genre'];
    
    if (isset($genre)){
        $stmt = $conn->prepare("INSERT INTO genre (nama) VALUES (?)");
        $stmt->bind_param("s", $genre);
        
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../ui/dbgenre.php");
        } else {
            echo "Error: " . $stmt->error;
            $stmt->close();
            exit();
        }
    }
}
$conn->close();
?>