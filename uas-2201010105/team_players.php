<!DOCTYPE html>
<html>
<head>
    <title>CRUD Baseball - Daftar Pemain</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baseball";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    function getTeamPlayers($team) {
        global $conn;
        $sql = "SELECT * FROM players WHERE team = '$team'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    if (isset($_GET['team'])) {
        $team = $_GET['team'];
        $players = getTeamPlayers($team);
    } else {
        echo "Tim tidak ditemukan.";
        exit();
    }
    ?>

    <h1>CRUD Baseball - Daftar Pemain</h1>
    <h2>Tim: <?php echo $team; ?></h2>

    <?php if (!empty($players)) { ?>
        <table>
            <tr>
                <th>Nama</th>
                <th>Posisi</th>
            </tr>
            <?php foreach ($players as $player) { ?>
                <tr>
                    <td><?php echo $player['name']; ?></td>
                    <td><?php echo $player['position']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Tidak ada pemain.</p>
    <?php } ?>
</body>
</html>
