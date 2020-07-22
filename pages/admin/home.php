<?php
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_group_id'] != 1) {
        echo "Bitte anmelden!";
        die();
    }

    include('../../class/db.php');
    include('../../class/user.php');
    include('../../class/reiseziel.php');

    $user = new User();
    $user->getUserByUserId($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | LAP</title>
</head>
<body>
    <h1>Hello Admin <?= $user->firstname ?> <?= $user->lastname ?>!</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Betreuer</th>
        </tr>
        <?php
            $reiseziel = new ReiseZiel();
            foreach ($reiseziel->getAllDestinations() as $key => $value) { ?>
                <tr>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                </tr>
        <?php } ?>
    </table>

    <table>
        <tr>
            <th>Name</th>
            <th>Passwort ändern</th>
        </tr>
        <?php
            $reiseziel = new ReiseZiel();
            foreach ($user->getAllUsers() as $key => $value) { ?>
                <tr>
                    <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                    <td><a href="../changePassword.php?id=<?= $value['id'] ?>">ändern</a></td>
                </tr>
        <?php } ?>
    </table>
    <a href="changeUserDetails.php">Benutzer verwalten</a>
    <a href="addDestination.php">Reiseziel hinzufügen</a>
    <a href="../logout.php">logout</a>
</body>
</html>