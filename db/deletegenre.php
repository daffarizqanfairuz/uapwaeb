<?php
include 'koneksi.php';

$genreid = $_GET['id'];

$genredel = "DELETE FROM genre WHERE genreid = $genreid";
$delRes = $conn->query($genredel);
if ($delRes){
    echo "Sukses";
} else {
    echo "error : " . $conn->error;
}
?>