<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM akun WHERE email = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['passwords'];
            $storedid = $row['id'];

            if ($password === $stored_password) {
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $storedid;
                header("Location: ../ui/index.html"); // Sementara html 
            } else {
                $_SESSION['login_error'] = "Password salah";
                mysqli_free_result($result);
                mysqli_close($conn);
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Username tidak ditemukan";
            mysqli_free_result($result);
            mysqli_close($conn);
            header("Location: ../ui/login.html");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Query database gagal";
        mysqli_close($conn);
        header("Location: ../error/error.html");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Metode request tidak valid";
    header("Location: ../error/error.html");
    exit();
}
?>
