<?php session_start();
	require_once "db.php";

  	$sql = "UPDATE users  SET first_name ='{$_POST['first_name']}', last_name ='{$_POST['last_name']}', password ='{$_POST['password']}', login ='{$_POST['login']}', id_role ='{$_POST['id_role']}' WHERE id = '{$_GET['id']}'";
	
	echo  $sql;

	if ($conn->query($sql) === TRUE) {
		if($_GET['id'] == $_SESSION['id']){
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['id_role'] = $_POST['id_role'];
		}
	}
	header('Location: main.php');
?>