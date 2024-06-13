<?php 
include '../db/koneksi.php';
include '../db/authadmin.php';
$genreID = $_GET['genreID'];

$editSQL = "SELECT * FROM genre WHERE genreID = $genreID";
$editRes = $conn->query($editSQL);
$editRow = $editRes->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
    <link rel="stylesheet" href="../css/tambah.css">
</head>
<body>
    <h1>Edit Genre<br></h1>
    <a href="dbgenre.php">Kembali</a>
    <form method="POST" action="../db/editgenre.php">
        <input type="hidden" name="genreID" value="<?php echo $genreID; ?>">

        <label>Genre Game</label>
        <input type="text" name="genre" value="<?php echo $editRow['nama']; ?>" required>
        <br>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>