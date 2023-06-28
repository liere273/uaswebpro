<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemain</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baseball";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    function getPlayers() {
        global $conn;
        $sql = "SELECT * FROM players";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    $players = getPlayers();
    ?>

    <h1>Daftar Pemain</h1>

    <a href="add_player.php">Tambah Pemain</a><br><br>

    <?php if (!empty($players)) { ?>
        <table>
            <tr>
                <th>Nama</th>
                <th>Tim</th>
                <th>Posisi</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($players as $player) { ?>
                <tr>
                    <td><?php echo $player['name']; ?></td>
                    <td><?php echo $player['team']; ?></td>
                    <td><?php echo $player['position']; ?></td>
                    <td>
                        <a href="edit_player.php?id=<?php echo $player['id']; ?>">Edit</a> |
                        <a href="delete_player.php?id=<?php echo $player['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Tidak ada pemain.</p>
    <?php } ?>
</body>
</html>
