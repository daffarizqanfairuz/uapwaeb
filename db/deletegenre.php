<?php
include 'koneksi.php';

$genreid = $_GET['id'];

$genredel = "DELETE FROM genre WHERE genreid = $genreid";
$delRes = $conn->query($genredel);
if ($delRes){
    header("Location: ../ui/dbgenre.php");
} else {
    echo "error : " . $conn->error;
}
?>