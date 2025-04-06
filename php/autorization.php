<?php
    session_start();
	require('../php/connect.php');
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM log_in WHERE login='$login' AND password='$password'";
		$res = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($res);
		
		if (!empty($user)) {
            $_SESSION['auth'] = true;
            header('Location: ../html/main_screen.php');
            die();
		} else {
            header('Location: ../html/Kyrsovay_log_in.php');
			die();
		}
	}
?>