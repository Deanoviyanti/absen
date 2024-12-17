<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Dashboard Sekolah</title>
    <style>
        body {
          display: flex;
          height: 100vh;
          margin: 0;
          font-family: Arial, sans-serif;
          background-color: #1d3447;
          color: white;
        }
        .sidebar {
          width: 250px;
          color: white;
          display: flex;
          flex-direction: column;
          padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 15px 20px;
            display: block;
            border-bottom: 1px solid #ccc;
        }
        .sidebar a:hover {
            background-color: #3b7bbf;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #2a4d64;
            color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            margin: 10px 0;
            background-color: #3b7bbf;
            border-radius: 8px;
            color: white;
        }
        .logout {
            margin-top: auto;
            text-align: center;
        }
        .logout a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            background-color: #e11d48;
            border-radius: 5px;
        }
        .logout a:hover {
            background-color: #9f1239;
        }
        .button-inactive {
            background-color: #93c5fd; 
            color: white;
            border: 1px solid #ccc;
        }
        .button-active {
            background-color: #e11d48;
            color: white;
            border: 1px solid #ccc;
        }
        .button-inactive:hover, .button-active:hover {
            opacity: 0.8;
        }
        .graph {
            background-color: #93c5fd;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .icons {
            color: white;
        }
        .sidebar img {
            display: block;
            margin: 0 auto 10px;
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
  <div class="sidebar">
    <img src="img/vn.png" style="width: 30%; height: 10%;">
      <center><h5>Nusa Cendekia</h5></center>
      <a href="#"><i class="fa fa-home" style="margin-top: 15%;"></i> Dashboard</a>
      <a href="modul/input_siswa.php"><i class="fa fa-user-plus"></i> Input Siswa</a>
      <a href="modul/input_absensi.php"><i class="fa fa-clipboard"></i> Input Absensi</a>
      <a href="modul/lihat_absensi.php"><i class="fa fa-eye"></i> Lihat Absensi</a>
    <div class="logout">
      <a href="logout.php">Logout</a>
    </div>
  </div>
<div class="content">
    <h4 class="text-center" style="margin-top: 25%;">Selamat Datang, Absensi Nusa Cendekia</h4>
    <p class="text-center"> tempat di mana pendidikan dan teknologi bersinergi</p>
    <center><img src="img/90.png" style="width: 30%;"></center>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
