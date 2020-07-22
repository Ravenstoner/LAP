<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo "Bitte anmelden!";
        die();
    }

    include('../class/db.php');
    include('../class/user.php');

    $user = new User();
    $user->getUserByUserId($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | LAP</title>
</head>
<body>
    <h1>Hello <?= $user->firstname ?> <?= $user->lastname ?>!</h1>
    <a href="changePassword.php">Passwort ändern</a>
    <a href="logout.php">logout</a>
</body>
</html>