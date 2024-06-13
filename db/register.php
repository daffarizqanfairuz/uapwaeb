<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $email = $_POST['email'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $conn->begin_transaction();

    try {
        $sql1 = "INSERT INTO akun (username, email, passwords) VALUES ('$email','$email', '$password')";
        if ($conn->query($sql1) === TRUE) {
            $userid = $conn->insert_id;
            $conn->commit();
            header("Location: ../ui/login.html");
            exit();

        } else {
            $conn->rollback();
            echo "Error: " . $conn->error;
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Exception: " . $e->getMessage();
    }
}
?>