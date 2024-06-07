<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['newpass'];
    $id = $_POST['id'];
  
    $update_query = "UPDATE akun SET passwords = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("si", $new_password, $id);
  
    if ($update_stmt->execute()) {
        header("Location: ../ui/login.html");
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui password.";
        exit();
    }
    $update_stmt->close();
    $conn->close();
}
?>