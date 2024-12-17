<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
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
        .logo-container {
            text-align: center;
            margin-top: 3%;
        }
        form {
            background-color: #ffffff; 
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
            min-height: 270px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #354a64;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            min-height: 45px;
        }
        button {
            width: 100%;
            background-color: #354a64;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            border: none;
            padding: 12px;
            min-height: 45px;
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

    <div class="logo-container">
        <img src="../img/nv.png" alt="Logo" class="logo" style="width: 20%;">
    </div>
    <h4 style="color:white;">Form Input Data Siswa</h4>

    <form method="POST">
        <label for="nama">Nama Siswa:</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama siswa" required>

        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" id="kelas" placeholder="Masukkan kelas siswa" required>

        <button type="submit">Simpan</button>
    </form>

    <center><img src="../img/90.png" style="width: 50%; height: 10%;"></center>

</body>
</html>
