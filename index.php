<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'default';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        switch ($page) {
            case 'absen':
                include "modul/input_absensi.php";
                break;
            case 'siswa':
                include "modul/input_siswa.php";
                break;
            case 'lihat':
                include "modul/lihat_absensi.php";
                break;
            case 'edit':
                include "modul/edit.php";
                break;
            case 'hapus':
                include "modul/hapus.php";
                break;
            default:
                include "modul/default.php";
                break;
        }
    ?>
</body>
</html>
