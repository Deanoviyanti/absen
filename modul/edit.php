<?php
include 'lib/koneksi.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT absensi.status, siswa.nama FROM absensi JOIN siswa ON absensi.id_siswa = siswa.id WHERE absensi.id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if (!$data) {
            die("Data tidak ditemukan!");
        }
        $stmt->close();
    } else {
        die("Gagal mempersiapkan query: " . $conn->error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'];
        $sql = "UPDATE absensi SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("si", $status, $id);
            $stmt->execute();
            $stmt->close();

            header('Location: ../index.php?page=lihat_absensi');
            exit();
        } else {
            die("Gagal mempersiapkan query: " . $conn->error);
        }
    }
} else {
    die("ID tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d3447;
            color: #ffffff;
            margin: 0;
            padding: 20px;
        }
        h5 {
            text-align: center;
            color: #ffffff;
            margin-top: 1%;
        }
        form {
            max-width: 400px;
            margin: 30px auto;
            background: #2a475e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], select, button {
            width: calc(100% - 1px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input[disabled] {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }
        button {
            background-color: #56789c;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #354a64;
        }
    </style>
</head>
<body>
    <center><img src="img/nv.png" style="width: 5%; height: 10%; margin-top: 5%;"></center>
    <h5>Edit Absensi</h5>
    <form method="post">
        <label for="nama">Nama Siswa:</label>
        <input type="text" id="nama" value="<?= htmlspecialchars($data['nama']); ?>" disabled>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Hadir" <?= $data['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
            <option value="Sakit" <?= $data['status'] == 'Sakit' ? 'selected' : ''; ?>>Sakit</option>
            <option value="Izin" <?= $data['status'] == 'Izin' ? 'selected' : ''; ?>>Izin</option>
            <option value="Alpa" <?= $data['status'] == 'Alpa' ? 'selected' : ''; ?>>Alpa</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
    <center><img src="img/90.png" style="width: 30%; height: 10%;"></center>
</body>
</html>
