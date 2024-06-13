<?php
include 'koneksi.php';

$gameid = $_GET['id'];

$delgame = "DELETE FROM game WHERE gameid = $gameid";
$delRes = $conn->query($delgame);
if ($delRes){
    header("Location: ../ui/db.php");
} else {
    echo "error : " . $conn->error;
}
?>