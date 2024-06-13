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
        <a class="btn btn-primary no" href="dbaddgenre.php" role="button">Tambah Genre</a>
        <div class="table-wrapper">
        <table class="table mt-3 wid-auto mw-100">
            <thead>
                <tr class="table-light">
                    <th>No</th>
                    <th>ID</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $genreSQL = "SELECT * FROM genre";
                $genreRes = $conn->query($genreSQL);
                $no = 1;
                if ($genreRes->num_rows > 0){
                    while($genreRow = $genreRes->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$genreRow['genreID']."</td>";
                        echo "<td>".$genreRow['nama']."</td>";
                        echo '<td><div class="d-grid gap-2 d-md-block">
                                <a class="btn btn-primary wid-25 center textdec-n" type="button" href="dbeditgenre.php?genreID='.$genreRow['genreID'].'">Edit</a>
                                <a class="btn btn-primary wid-25 center textdec-n" type="button" href="../db/deletegenre.php?id='.$genreRow['genreID'].'">Delete</a>
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
