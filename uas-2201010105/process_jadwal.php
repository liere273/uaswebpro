<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baseball";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $team_home = $_POST['team_home'];
    $team_away = $_POST['team_away'];

    $sql = "INSERT INTO jadwal (tanggal, waktu, tempat, team_home, team_away)
            VALUES ('$tanggal', '$waktu', '$tempat', '$team_home', '$team_away')";

    if ($conn->query($sql) === TRUE) {
        echo "Jadwal pertandingan berhasil ditambahkan.";
        sleep(3); // Jeda 3 detik
        header("Location: jadwal.php"); // Alihkan ke halaman jadwal.php
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
