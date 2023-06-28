<!DOCTYPE html>
<html>
<head>
    <title>CRUD Baseball - Tambah Pemain</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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

    function addPlayer($name, $team, $position) {
        global $conn;
        $sql = "INSERT INTO players (name, team, position) VALUES ('$name', '$team', '$position')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $team = $_POST['team'];
        $position = $_POST['position'];
        if (addPlayer($name, $team, $position)) {
            echo "Data pemain berhasil ditambahkan.";
            echo "<meta http-equiv='refresh' content='3;url=players.php'>";
        } else {
            echo "Error: Gagal menambahkan data pemain.";
        }
    }
    ?>

    <h1>CRUD Baseball - Tambah Pemain</h1>

    <form method="post" action="">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>

        <label for="team">Tim:</label>
        <select id="team" name="team" required>
            <option value="Sanur Rizer">Sanur Rizer</option>
            <option value="Redsox Denpasar">Redsox Denpasar</option>
            <option value="Softball Denpasar">Softball Denpasar</option>
            <option value="pra-PON">pra-PON</option>
            <option value="SouthWest Riverside">SouthWest Riverside</option>
        </select>

        <label for="position">Posisi:</label>
        <select id="position" name="position" required>
            <option value="Pitcher">Pitcher</option>
            <option value="Catcher">Catcher</option>
            <option value="First base">First base</option>
            <option value="Second Base">Second Base</option>
            <option value="Third Base">Third Base</option>
            <option value="Shortstop">Shortstop</option>
            <option value="Left field">Left field</option>
            <option value="Center field">Center field</option>
            <option value="Right field">Right field</option>
        </select>

        <input type="submit" name="submit" value="Tambah">
    </form>
</body>
</html>
