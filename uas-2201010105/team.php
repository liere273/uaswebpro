<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tim</title>
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

    function getTeams() {
        global $conn;
        $sql = "SELECT DISTINCT team FROM players";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    $teams = getTeams();
    ?>

    <h1>Daftar Tim</h1>

    <?php if (!empty($teams)) { ?>
        <table>
            <tr>
                <th>Tim</th>
            </tr>
            <?php foreach ($teams as $team) { ?>
                <tr>
                    <td>
                        <a href="team_players.php?team=<?php echo urlencode($team['team']); ?>">
                            <?php echo $team['team']; ?>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Tidak ada tim.</p>
    <?php } ?>

</body>
</html>
