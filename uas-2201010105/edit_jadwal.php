<!DOCTYPE html>
<html>
<head>
    <title>CRUD Baseball - Edit Jadwal Pertandingan</title>
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

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $tempat = $_POST['tempat'];
        $team_home = $_POST['team_home'];
        $team_away = $_POST['team_away'];

        $sql = "UPDATE jadwal SET tanggal = '$tanggal', waktu = '$waktu', tempat = '$tempat', team_home = '$team_home', team_away = '$team_away' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Jadwal pertandingan berhasil diperbarui.";
            sleep(3); // Jeda 3 detik
            header("Location: jadwal.php"); // Alihkan ke halaman jadwal.php
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM jadwal WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            $tanggal = $data['tanggal'];
            $waktu = $data['waktu'];
            $tempat = $data['tempat'];
            $team_home = $data['team_home'];
            $team_away = $data['team_away'];
        } else {
            echo "Jadwal pertandingan tidak ditemukan.";
            exit;
        }
    }
    ?>

    <h1>CRUD Baseball - Edit Jadwal Pertandingan</h1>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" required><br><br>
        <label>Waktu:</label>
        <input type="time" name="waktu" value="<?php echo $waktu; ?>" required><br><br>
        <label>Tempat:</label>
        <input type="text" name="tempat" value="<?php echo $tempat; ?>" required><br><br>
        <label>Team Home:</label>
        <input type="text" name="team_home" value="<?php echo $team_home; ?>" required><br><br>
        <label>Team Away:</label>
        <input type="text" name="team_away" value="<?php echo $team_away; ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>

</body>
</html>
