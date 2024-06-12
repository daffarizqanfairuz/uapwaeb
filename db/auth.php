<?php
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

if ($userID) {
    $sql = "
        SELECT a.username, a.email 
        FROM akun a
        WHERE a.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $nama = isset($user['username']) ? $user['username'] : '';
    $email = isset($user['email']) ? $user['email'] : '';
} else {
    $user = null;
    $nama = '';
    $email = '';
    $akses = 0;
}

$logon = $user ? 1 : 0;
?>