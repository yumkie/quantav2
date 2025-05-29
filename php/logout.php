<?php
    session_start(); //запуск сессии
    session_destroy(); //уничтоэение сессии
    header("Location: ../html/log_in.php"); //редирект на страницу авторизации
    die();
?>