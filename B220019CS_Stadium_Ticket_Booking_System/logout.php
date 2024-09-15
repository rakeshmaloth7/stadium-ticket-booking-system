<?php
	session_start();
	unset($_SESSION['usersid']);
	unset($_SESSION['usersname']);
	unset($_SESSION['usersimage']);
	unset($_SESSION['user_login']);
	header("location:index.php");
?>