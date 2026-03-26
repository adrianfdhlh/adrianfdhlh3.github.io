<?php
session_start();

// data user
$valid_user = "admin";
$valid_pass = "12345";

// proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['username'] = $username;
    } else {
        $error = "Username atau Password salah!";
    }
}

// logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login & Dashboard</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            padding: 35px;
            border-radius: 15px;
            width: 340px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            color: white;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: rgba(255,255,255,0.2);
            color: white;
        }

        input::placeholder {
            color: #eee;
        }

        button {
            width: 100%;
            padding: 12px;
            background: white;
            border: none;
            color: #333;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #ddd;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: white;
            text-decoration: none;
        }

        .error {
            background: rgba(255,0,0,0.2);
            padding: 8px;
            border-radius: 6px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container">

<?php if (!isset($_SESSION['username'])): ?>

    <h2>Login</h2>

    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Login</button>
    </form>

<?php else: ?>

    <h2>Dashboard</h2>
    <p>Selamat datang, <b><?php echo $_SESSION['username']; ?></b></p>

    <a href="?logout=true">Logout</a>

<?php endif; ?>

</div>

</body>
</html>