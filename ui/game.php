<?php
include '../db/koneksi.php';

if (isset($_GET['platform'])){
    $platform = $_GET['platform'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rekomendasi Permainan</title>
</head>
<body>
    <?
    include 'navbar.php';
    ?>
    
</body>
</html>