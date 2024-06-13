<?php include 'koneksi.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <link rel="stylesheet" href="../css/tambah.css">
</head>
<body>
    <h1>Tambah Daftar Game<br></h1>
    <a href="../ui/dashboard.html">Kembali ke daftar tugas</a>
    <form method="post" Action="create.php">
        <label>Platform Game:</label>
        <input type="text" name="platformID" required>
        <br>
        <label>Genre Game</label>
        <input type="text" name="genreID" required>
        <br>
        <label>Judul Game</label>
        <input type="text" name="nama" required>
        <br>
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" required>
        <br>
        <label>Rating Game</label>
        <input type="text" name="rating " required>
        <br>
        <button type="submit">Tambah Daftar Game</button>
    </form>

    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $platformID = $_POST['platformID'];
        $genreID = $_POST['genreID'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $nama = $_POST['deskripsi'];

        $stmt = $conn->prepare("INSERT INTO users (mata_kuliah, tanggal, link) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $mata_kuliah, $tanggal, $link);
        if ($stmt->execute()) {
            echo "Daftar tugas baru berhasil ditambahkan.";
        }else{
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
    
</body>
</html>