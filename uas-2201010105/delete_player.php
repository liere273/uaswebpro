<!DOCTYPE html>
<html>
<head>
    <title>CRUD Baseball - Hapus Pemain</title>
    <meta http-equiv="refresh" content="3;url=players.php">
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

    function deletePlayer($conn, $id) {
        $sql = "DELETE FROM players WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Data pemain berhasil dihapus.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    if (isset($_GET['id'])) {
        $playerId = $_GET['id'];
        deletePlayer($conn, $playerId);
    } else {
        echo "ID pemain tidak ditemukan.";
    }

    $conn->close();
    ?>
</body>
</html>
