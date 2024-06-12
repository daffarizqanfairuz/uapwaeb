<?php
include '../db/koneksi.php';

$game = isset($_GET['gameID']) ? $_GET['gameID'] : '1';

$query_game = "SELECT game.gameID as id, game.platformID as platID, 
                      game.nama as nama, game.deskripsi, genre.nama as genre,
                      game.komentar, game.rating
               FROM game 
               JOIN genre ON game.genreID = genre.genreID
               JOIN platform ON game.platformID = platform.id
               AND game.gameID = ?";
$stmt_game = $conn->prepare($query_game);
$stmt_game->bind_param('s', $game);
$stmt_game->execute();
$result_game = $stmt_game->get_result();

$row_game = mysqli_fetch_assoc($result_game);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $row_game['nama'] ?></title>
    <link rel="stylesheet" href="../css/detail.css">
</head>
<body>

    <?php 
    include 'navbar.php'; 
    ?>
    
    <div class="container mt-5 pt-5">
        <div class="row mt-3">
            <div class="col">
                <a href="game.php" class="riz"><i class="fa-solid fa-chevron-left"></i> Details</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <p class="title">
                    <?php echo $row_game['nama'];?>
                </p>
            </div>
        </div>
        <div class="row top-0 me-2">
            <div class="col top-0 right">
                Rating : <?php echo $row_game['rating'];?>/5
            </div>
        </div>
        <div class="row mt-5">
            <p><?php
            echo $row_game['deskripsi'];
            ?>
            </p>
        </div>
        <div class="row mt-5">
            <p><?php
            echo $row_game['komentar'];
            ?>
            </p>
        </div>
    </div>
</body>
</html>