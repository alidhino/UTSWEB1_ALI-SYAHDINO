<?php
session_start(); // mulai session

$error = "";


?>

<!DOCTYPE html>
<html>

<head>
    <title>POLGAN MART - Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
        }

        .login-box {
            width: 300px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            width: 100%;
            padding: 8px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h3>POLGAN MART</h3>
        <?php if ($error != "") echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
