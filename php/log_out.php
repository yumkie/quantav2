<?php
    session_start();
    require('../php/connect.php');
    $_SESSION['auth'] = null;
    $id = $_SESSION['id'];
    $update = "UPDATE `log_in` SET `visit`='ofline' WHERE id='$id'";
    $res = mysqli_query($link, $update);
    header('Location: ../html/Kyrsovay_log_in.php');
    die();
    session_destroy();
?>