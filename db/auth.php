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

    $nama = isset($user_query['username']) ? $user_query['username'] : '';
    $email = isset($user_query['email']) ? $user_query['email'] : '';
    $akses = isset($user_query['akses']) ? $user_query['akses'] : '';
    
} else {
    $user = null;
    $nama = '';
    $email = '';
    $akses = 0;
}

$logon = $user ? 1 : 0;
?>