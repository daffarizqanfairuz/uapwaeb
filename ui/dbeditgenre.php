<?php 
include '../db/koneksi.php';
include '../db/authadmin.php';
$gameID = $_GET['gameID'];

$editSQL = "SELECT g.genreID, g.platformID, g.nama,
                   g.deskripsi, g.komentar, g.rating, 
                   r.nama as genreNama, p.nama as platformNama
                   FROM game g
                   JOIN platform p ON g.platformID = p.id
                   JOIN genre r ON g.genreID = r.genreID
                   WHERE gameID = $gameID";
$editRes = $conn->query($editSQL);
$editRow = $editRes->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link rel="stylesheet" href="../css/tambah.css">
</head>
<body>
    <h1>Edit Game<br></h1>
    <a href="db.php">Kembali</a>
    <form method="POST" action="../db/editgame.php">
        <input type="hidden" name="gameID" value="<?php echo $gameID; ?>">

        <label>Platform Game:</label>
        <select name="platform" id="platform">
            <?php
            $platformSQL = "SELECT * FROM platform ORDER BY nama";
            $platformRes = $conn->query($platformSQL);
            while($platRow = $platformRes->fetch_assoc()) {
                $selected = $platRow['id'] == $editRow['platformID'] ? 'selected' : '';
                echo "<option value='".$platRow['id']."' $selected>".$platRow['nama']."</option>";
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
                $selected = $genreRow['genreID'] == $editRow['genreID'] ? 'selected' : '';
                echo "<option value='".$genreRow['genreID']."' $selected>".$genreRow['nama']."</option>";
            }
            ?>
        </select>
        <br>

        <label>Judul Game</label>
        <input type="text" name="nama" value="<?php echo $editRow['nama']; ?>" required>
        <br>

        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="<?php echo $editRow['deskripsi']; ?>" required>
        <br>

        <label>Komentar</label>
        <input type="text" name="komentar" value="<?php echo $editRow['komentar']; ?>" required>
        <br>

        <label>Rating Game</label>
        <input type="number" name="rating" min="0" max="5" value="<?php echo $editRow['rating']; ?>" required>
        <br>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>