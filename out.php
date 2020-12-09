<?php session_start();

	$_SESSION["id_role"] = false;
	$_SESSION["login"] = false;
	$_SESSION["id"] = false;

	header('Location: main.php');
	?>