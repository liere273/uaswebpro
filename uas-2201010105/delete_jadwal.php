<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baseball";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM jadwal WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Jadwal pertandingan berhasil dihapus.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
    