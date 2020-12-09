<?php session_start();
	require_once "db.php";

	$sql = "DELETE FROM `users` WHERE id = '{$_GET['id']}'";

	echo  $sql;
	if($conn->query($sql)=== TRUE){
		if($_SESSION['id_role'] != 1){
			$_SESSION["id_role"] = false;
			$_SESSION["login"] = false;
			$_SESSION["id"] = false;
		}
	}	
	header('Location: main.php');


?>