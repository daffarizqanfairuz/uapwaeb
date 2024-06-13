<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['passwords'];

            if ($password === $stored_password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $email;
                $_SESSION['userID'] = $row['id'];
                $_SESSION['akses'] = $row['akses'];

                header("Location: ../ui/index.php");
                exit();
            } else {
                $_SESSION['login_error'] = "Password salah";
                header("Location: ../ui/login.html");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Username tidak ditemukan";
            header("Location: ../ui/login.html");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Query database gagal";
        header("Location: ../error/error.html");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Metode request tidak valid";
    header("Location: ../error/error.html");
    exit();
}
?>
