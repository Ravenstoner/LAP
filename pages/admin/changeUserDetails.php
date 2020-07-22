<?php
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_group_id'] != 1) {
        echo "Bitte anmelden!";
        die();
    }

    include('../../class/db.php');
    include('../../class/user.php');

    $user = new User();
    $user->getUserByUserId($_SESSION['user_id']);

    if (isset($_POST['groupid']) && isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['street']) && isset($_POST['city'])) {
        $user->updateUserById($_GET['id'], $_POST['groupid'], $_POST['name'], $_POST['firstname'], $_POST['lastname'], $_POST['street'], $_POST['city']);
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | LAP</title>
</head>
<body>
    <h1>Benutzer verwalten!</h1>

    <table>
        <tr>
            <th>Gruppe</th>
            <th>Benutzername</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Straße</th>
            <th>Ort</th>
            <th>Speichern</th>
        </tr>
        <?php
            foreach ($user->getAllUsers() as $key => $value) { ?>
                <tr>
                    <form action="changeUserDetails.php?id=<?= $value['id'] ?>" method="post">
                        <td>
                            <select name="groupid">
                                <?php foreach ($user->getAllGroups() as $key1 => $value1) { ?>
                                    <option value="<?= $value1['id'] ?>" <?= ($_SESSION['user_id'] == $value['id']) ? "selected" : "" ?>><?= $value1['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="text" name="name" value="<?= $value['name'] ?>"></td>
                        <td><input type="text" name="firstname" value="<?= $value['firstname'] ?>"></td>
                        <td><input type="text" name="lastname" value="<?= $value['lastname'] ?>"></td>
                        <td><input type="text" name="street" value="<?= $value['street'] ?>"></td>
                        <td><input type="text" name="city" value="<?= $value['city'] ?>"></td>
                        <td><input type="submit" value="Speichern"></td>
                    </form>
                </tr>
        <?php } ?>
    </table>

    <a href="home.php">zurück</a>
</body>
</html>