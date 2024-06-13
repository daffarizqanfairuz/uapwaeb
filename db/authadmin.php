<?php
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

if ($userID) {
    $sql = "
        SELECT a.username, a.email , a.akses
        FROM akun a
        WHERE a.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_query = $result->fetch_assoc();

    $nama = $user_query['username'];
    $email = $user_query['email'];
    $akses = $user_query['akses'];
    $logon = 1;

    if ($akses == 1){
    }
    else {
        header("Location: ../ui/index.php");
    }
} else {
    header("Location: ../ui/index.php");
}
?>