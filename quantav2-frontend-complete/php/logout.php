<?php
    session_start(); //запуск сессии
    $_SESSION = false; //идентификация выхода из аккаунта
    session_destroy(); //уничтоэение сессии
    header("Location: ../html/log_in.php"); //редирект на страницу авторизации
    die();
?>