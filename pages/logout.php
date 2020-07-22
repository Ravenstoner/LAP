<?php
    session_start();
    $_SESSION['user_id'] = "";
    $_SESSION['user_group_id'] = "";
    session_destroy();
    session_unset();
    header('Location: ../index.php')
?>