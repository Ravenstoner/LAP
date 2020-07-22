<?php
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['user_group_id'] != 1) {
        echo "Bitte anmelden!";
        die();
    }

    include('../../class/db.php');
    include('../../class/user.php');
    include('../../class/betreuer.php');
    include('../../class/reiseziel.php');

    $user = new User();
    $betreuer = new Betreuer();
    $reiseziel = new ReiseZiel();

    if (isset($_POST['name']) && isset($_POST['betreuer'])) {
        $reiseziel->addDestination($_POST['name'], $_POST['betreuer']);
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
    <h1>Reiseziel hinzufügen!</h1>

    <form action="" method="post">
        <input type="text" name="name" placeholder="Reiseziel">
        <select name="betreuer">
            <?php foreach ($betreuer->getAllBetreuer() as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['firstname'] ?> <?= $value['lastname'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="hinzufügen">
    </form>    

    <a href="home.php">zurück</a>
</body>
</html>