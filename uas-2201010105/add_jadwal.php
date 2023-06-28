<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal Pertandingan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <h1>CRUD Baseball - Tambah Jadwal Pertandingan</h1>

    <form method="post" action="process_jadwal.php">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br>

        <label for="waktu">Waktu:</label>
        <input type="time" id="waktu" name="waktu" required><br>

        <label for="tempat">Tempat:</label>
        <input type="text" id="tempat" name="tempat" required><br>

        <label for="team_home">Tim Home:</label>
        <input type="text" id="team_home" name="team_home" required><br>

        <label for="team_away">Tim Away:</label>
        <input type="text" id="team_away" name="team_away" required><br>

        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>
