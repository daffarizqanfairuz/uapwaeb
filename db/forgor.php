<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $query = "SELECT id FROM akun WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        header("Location: ../ui/newpass.php?id=" . $id);
        exit();
    } else {
        echo "Email tidak ditemukan.";
    }
    $stmt->close();
    $conn->close();
}
?>
