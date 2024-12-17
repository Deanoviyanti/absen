<?php

include '../lib/koneksi.php';

$sql = "SELECT absensi.id, siswa.nama, siswa.kelas, absensi.tanggal, absensi.status 
        FROM absensi 
        JOIN siswa ON absensi.id_siswa = siswa.id";

$result = $conn->query($sql);
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d3447;
            color: #354a64;
            margin: 0;
            padding: 20px;
        }
        h1, h5 {
            text-align: center;
            color: white;
        }
        .logo {
            display: block;
            margin: 0 auto;
            width: 100px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 14px 30px;
            text-align: center;
            color: white;
        }
        .editapus {
            gap: 10px;
        }
        .editapus a {
            padding: 8px 15px;
            font-size: 14px;
            color: white;
            background-color: #56789c;
            border-radius: 5px;
            text-decoration: none;
            border: 1px solid #354a64;
        }
        .editapus a:hover {
            background-color: #354a64;
        }
    </style>
</head>
<body>

<img src="../img/nv.png" alt="Logo" class="logo" style="width: 5%;">
<center><h5 style="margin-top: 1%;">Absensi Siswa Nusa Cendekia</h5></center>

<table>
    <tr>
        <th>No.</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data as $no => $row): ?>
        <tr>
            <td><?= ++$no; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['kelas']); ?></td>
            <td><?= htmlspecialchars($row['tanggal']); ?></td>
            <td><?= htmlspecialchars($row['status']); ?></td>
            <td class="editapus">
                <a href="../index.php?page=edit&id=<?= $row['id']; ?>">Edit</a>
                <a href="../index.php?page=hapus&id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
