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
        <div class="table-wrapper">
        <table class="table mt-3 wid-auto mw-100">
            <thead>
                <tr class="table-light">
                    <th>No</th>
                    <th>ID</th>
                    <th class="wid-15">Platform Game</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gameSQL = "SELECT * FROM platform";
                $gameRes = $conn->query($gameSQL);
                $no = 1;
                if ($gameRes->num_rows > 0){
                    while($gameRow = $gameRes->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$gameRow['id']."</td>";
                        echo "<td>".$gameRow['nama']."</td>";
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