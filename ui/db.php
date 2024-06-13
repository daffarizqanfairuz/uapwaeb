<?php
include '../db/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <?php
    include 'navbaradmint.php';
    ?>

    <div class="container w-100 max-tr">
        <a class="btn btn-primary no" href="dbaddgame.php" role="button">Tambah Game</a>
        <div class="table-wrapper">
        <table class="table mt-3 wid-auto mw-100">
            <thead>
                <tr class="table-light">
                    <th>No</th>
                    <th>ID</th>
                    <th class="wid-15">Platform Game</th>
                    <th>Genre</th>
                    <th>Judul Game</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gameSQL = "SELECT g.gameID , g.genreID, g.platformID, g.nama, 
                                   g.rating, r.nama as genreNama, p.nama as platformNama
                                   FROM game g
                                   JOIN platform p ON g.platformID = p.id
                                   JOIN genre r ON g.genreID = r.genreID
                                   ORDER BY g.platformID ASC, genreNama ASC";
                $gameRes = $conn->query($gameSQL);
                $no = 1;
                if ($gameRes->num_rows > 0){
                    while($gameRow = $gameRes->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$gameRow['gameID']."</td>";
                        echo "<td>".$gameRow['platformNama']."</td>";
                        echo "<td>".$gameRow['genreNama']."</td>";
                        echo "<td>".$gameRow['nama']."</td>";
                        echo "<td>".$gameRow['rating']."</td>";
                        echo '<td><div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-primary wid-25 center textdec-n" type="button" href="dbeditgame.php?gameID='.$gameRow['gameID'].'">Edit</a>
                                <a class="btn btn-primary wid-25 center textdec-n" type="button" href="../db/deletegame.php?id='.$gameRow['gameID'].'">Delete</a>
                            </div></td>';
                        echo "</tr>";
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>
