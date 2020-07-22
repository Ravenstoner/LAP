<?php
    include('class/db.php');
    include('class/login.php');

    if (isset($_POST['user_name']) && isset($_POST['user_password'])) {   
        $login = new Login();
        $login->loginUser( $_POST['user_name'], $_POST['user_password']);

    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | LAP</title>
    <style>
    html, body {
        height: 100vh;
    }
        form {
            display: flex;
            flex: 1;
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Kunden</h1>
        <input type="text" name="user_name" placeholder="Benutzername">
        <input type="password" name="user_password" placeholder="Passwort">
        <input type="submit" value="login">
        <a href="pages/admin/">admin</a>
    </form>
</body>
</html>