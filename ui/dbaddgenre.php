<?php 
include '../db/koneksi.php' ;
include '../db/authadmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Genre</title>
    <link rel="stylesheet" href="../css/tambah.css">
</head>
<body>
    <h1>Tambah Genre<br></h1>
    <a href="dbgenre.php">Kembali</a>
    <form method="POST" Action="../db/addgenre.php">
        <label>Nama Genre</label>
        <input type="text" name="genre" required>
        <br>
        <br>
        <button type="submit">Tambah Genre</button>
    </form>
</body>
</html>