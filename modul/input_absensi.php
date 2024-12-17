<?php
include '../lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO absensi (id_siswa, tanggal, status) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id_siswa, $tanggal, $status);
    $stmt->execute();
    $stmt->close();
}
$siswa = [];
$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $siswa[] = $row;
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d3447;
            color: #354a64;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1, h5 {
            text-align: center;
            color: #354a64;
        }
        .logo {
            display: block;
            margin: 10px auto 15px auto;
            width: 80px;
            height: auto;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #354a64;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input[type="date"] {
            padding-left: 10px;
        }
        button {
            width: 100%;
            background-color: #354a64;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            border: none;
            padding: 10px;
            margin: 0 auto;
        }
        button:hover {
            background-color: #56789c;
        }
        p {
            text-align: center;
            color: #2e7d32;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <img src="../img/nv.png" alt="Logo" class="logo" style="margin-top: 2%; width: 5%;">
    <h3 style="color:white;">Form Input Absensi</h3>

    <form method="POST">
        <label for="id_siswa">Nama Siswa:</label>
        <select name="id_siswa" id="id_siswa" required>
            <option value="" disabled selected>Pilih siswa</option>
            <?php foreach ($siswa as $row): ?>
                <option value="<?= $row['id']; ?>">
                    <?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="" disabled selected>Pilih status</option>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Alfa">Alfa</option>
            <option value="Izin">Izin</option>
        </select>

        <button type="submit" name="submit_absensi">Simpan</button>
    </form>
    <center><img src="../img/90.png" style="width: 50%; height: 10%;"></center>
</body>
</html>
