<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo "Bitte anmelden!";
        die();
    }

    include('../class/db.php');
    include('../class/user.php');

    $user = new User();
    if (isset($_POST['passwordNew'])) {
        $user->changeUserPassword((isset($_GET['id'])) ? $_GET['id'] : $_SESSION['user_id'], $_POST['passwordNew']);
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwort ändern | LAP</title>
</head>
<body>
    <h1>Passwort ändern!</h1>
    <form action="" method="post">
        <input type="password" name="passwordNew" placeholder="neues Passwort">
        <input type="submit" value="ändern">
    </form>
    <a href="<?= ($_SESSION['user_group_id'] != 1) ? "home.php" : "admin/home.php" ?>">zurück</a>
</body>
</html>