<?php 
include '../db/koneksi.php' ;
include '../db/authadmin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <link rel="stylesheet" href="../css/tambah.css">
</head>
<body>
    <h1>Tambah Game<br></h1>
    <a href="db.php">Kembali</a>
    <form method="POST" Action="../db/addgame.php">
        <label>Platform Game:</label>
        <select name="platform" id="platform">
            <?php
            $platformSQL = "SELECT * FROM platform ORDER BY nama";
            $platformRes = $conn->query($platformSQL);
            while($platRow = $platformRes->fetch_assoc()) {
                echo "<option value='".$platRow['id']."'> ".$platRow['nama']." </option>";
            }
            ?>
        </select>
        <br>

        <label>Genre Game</label>
        <select name="genre" id="genre">
            <?php
            $genreSQL = "SELECT * FROM genre ORDER BY nama";
            $genreRes = $conn->query($genreSQL);
            while($genreRow = $genreRes->fetch_assoc()) {
                echo "<option value='".$genreRow['genreID']."'>".$genreRow['nama']."</option>";
            }
            ?>
        </select>
        <br>

        <label>Judul Game</label>
        <input type="text" name="nama" required>
        <br>

        <label>Deskripsi</label>
        <input type="text" name="deskripsi" required>
        <br>

        <br>
        <label>Komentar</label>
        <input type="text" name="komentar" required>
        <br>

        <label>Rating Game</label>
        <input type="number" name="rating" min="0" max="5" required>
        <br>
        <br>
        <button type="submit">Tambah Daftar Game</button>
    </form>
</body>
</html>