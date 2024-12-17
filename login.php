<?php
session_start();
require 'lib/koneksi.php';

if (!$conn) {
    die("Koneksi database gagal: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    
    $sql = "SELECT * FROM users WHERE username = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit();
    } else {
        $error = "Username atau email salah. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('img/raw.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: white;
            color: #2a4d64;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container img {
            width: 50px;
            margin-bottom: 20px;
        }

        .login-container h4 {
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="email"] {
            width: 100%;
            padding: 20px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 15px;
            background-color: #3b7bbf;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #2a4d64;
        }

        .error-message {
            color: #e11d48;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="img/vn.png" style="width: 5rem;">
        <h4>Login</h4>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
    </div>
</body>
</html>
