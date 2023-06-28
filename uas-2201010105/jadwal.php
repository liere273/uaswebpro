<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Pertandingan</title>
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

    // Hapus Jadwal Pertandingan
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $sql = "DELETE FROM jadwal WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Jadwal pertandingan berhasil dihapus.";
            sleep(3); // Jeda 3 detik
            header("Location: jadwal.php"); // Alihkan ke halaman jadwal.php
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM jadwal";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>CRUD Baseball - Jadwal Pertandingan</h1>";
        echo "<a href='add_jadwal.php' class='add-button'>Tambah Jadwal</a><br><br>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Tanggal</th><th>Waktu</th><th>Tempat</th><th>Team Home</th><th>Team Away</th><th>Aksi</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['tanggal']."</td>";
            echo "<td>".$row['waktu']."</td>";
            echo "<td>".$row['tempat']."</td>";
            echo "<td>".$row['team_home']."</td>";
            echo "<td>".$row['team_away']."</td>";
            echo "<td>";
            echo "<a href='edit_jadwal.php?id=".$row['id']."'>Edit</a> | ";
            echo "<a href='jadwal.php?delete=".$row['id']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus jadwal ini?\")'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada jadwal pertandingan.";
    }

    $conn->close();
    ?>
</body>
</html>
