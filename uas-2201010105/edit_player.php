<!DOCTYPE html>
<html>
<head>
    <title>CRUD Baseball - Edit Pemain</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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

    // Fetch player data from database based on ID (assuming you have the ID value)
    $player_id = 1; // Contoh ID pemain yang akan dihapus
    $sql = "SELECT * FROM players WHERE id = $player_id";
    $result = $conn->query($sql);
    $player = $result->fetch_assoc();

    if (isset($_POST['delete'])) {
        // Hapus pemain dari database
        $sql = "DELETE FROM players WHERE id = $player_id";
        if ($conn->query($sql) === TRUE) {
            echo "Data pemain berhasil dihapus.";
            echo "<meta http-equiv='refresh' content='3;url=players.php'>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <h1>CRUD Baseball - Edit Pemain</h1>

    <form method="post" action="">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?php echo $player['name']; ?>" required><br>

        <label for="team">Tim:</label>
        <select id="team" name="team" required>
            <option value="Sanur Rizer" <?php if ($player['team'] == 'Sanur Rizer') echo 'selected'; ?>>Sanur Rizer</option>
            <option value="Redsox Denpasar" <?php if ($player['team'] == 'Redsox Denpasar') echo 'selected'; ?>>Redsox Denpasar</option>
            <option value="Softball Denpasar" <?php if ($player['team'] == 'Softball Denpasar') echo 'selected'; ?>>Softball Denpasar</option>
            <option value="pra-PON" <?php if ($player['team'] == 'pra-PON') echo 'selected'; ?>>pra-PON</option>
            <option value="SouthWest Riverside" <?php if ($player['team'] == 'SouthWest Riverside') echo 'selected'; ?>>SouthWest Riverside</option>
        </select><br>

        <label for="position">Posisi:</label>
        <select id="position" name="position" required>
            <option value="Pitcher" <?php if ($player['position'] == 'Pitcher') echo 'selected'; ?>>Pitcher</option>
            <option value="Catcher" <?php if ($player['position'] == 'Catcher') echo 'selected'; ?>>Catcher</option>
            <option value="First base" <?php if ($player['position'] == 'First base') echo 'selected'; ?>>First base</option>
            <option value="Second Base" <?php if ($player['position'] == 'Second Base') echo 'selected'; ?>>Second Base</option>
            <option value="Third Base" <?php if ($player['position'] == 'Third Base') echo 'selected'; ?>>Third Base</option>
            <option value="Shortstop" <?php if ($player['position'] == 'Shortstop') echo 'selected'; ?>>Shortstop</option>
            <option value="Left field" <?php if ($player['position'] == 'Left field') echo 'selected'; ?>>Left field</option>
            <option value="Center field" <?php if ($player['position'] == 'Center field') echo 'selected'; ?>>Center field</option>
            <option value="Right field" <?php if ($player['position'] == 'Right field') echo 'selected'; ?>>Right field</option>
        </select><br>

        <input type="submit" name="delete" value="Hapus">
    </form>
</body>
</html>
