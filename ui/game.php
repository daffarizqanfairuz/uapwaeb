<?php
include '../db/koneksi.php';

$platform = isset($_GET['platform']) ? $_GET['platform'] : 'pc';
$selected_genre = isset($_GET['genre']) ? $_GET['genre'] : 'action';

$query_platform = $conn->prepare("SELECT id FROM platform WHERE nama = ?");

$query_platform->bind_param('s', $platform);
$query_platform->execute();
$result_platform = $query_platform->get_result();
if ($result_platform->num_rows > 0) {
    $platform_data = $result_platform->fetch_assoc();
    $platformID = $platform_data['id'];
} else {
    $platformID = 1;
}

$query_genre = "SELECT * FROM genre";
$result_genre = mysqli_query($conn, $query_genre);

$query_game = "SELECT game.gameID , game.nama as game_name, game.deskripsi, genre.nama as genre_name 
               FROM game 
               JOIN genre ON game.genreID = genre.genreID 
               WHERE game.platformID = ? AND genre.nama = ?";

$stmt_game = $conn->prepare($query_game);
$stmt_game->bind_param('is', $platformID, $selected_genre);
$stmt_game->execute();
$result_game = $stmt_game->get_result();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rekomendasi Permainan</title>
    <link rel="stylesheet" href="../css/game.css">
</head>
<body>

    <?php 
    include 'navbar.php'; 
    ?>
    
    <div class="genre-container">
        <div class="genre-box">
            <?php while($row_genre = mysqli_fetch_assoc($result_genre)) { ?>
                <div class="genre-item <?php echo ($row_genre['nama'] == $selected_genre) ? 'active' : ''; ?>" data-genre="<?php echo $row_genre['nama']; ?>">
                    <?php echo $row_genre['nama']; ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="block top-1">
        <div class="block w-full">
            <div class="game-list">
                <div class="table">
                    <?php if ($result_game->num_rows > 0) { ?>
                        <?php while($row_game = mysqli_fetch_assoc($result_game)) { ?>
                            <div class="table-row" onclick="window.location.href='detail.php?gameID=<?php echo $row_game['gameID']; ?>'">
                                <div class="table-cell game-name table-click"><?php echo $row_game['game_name']; ?></div>
                                <div class="table-cell table-click"><?php echo $row_game['deskripsi']; ?></div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="table-row">
                            <div class="table-cell" colspan="2">Tidak ada game untuk genre ini.</div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/game.js"></script>
</body>
</html>