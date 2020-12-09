<?php
session_start();
require_once "db.php";

$sql = "INSERT INTO `users`(`first_name`, `last_name`, `password`, `login`, `id_role`)
VALUES ('{$_POST['first_name']}','{$_POST['last_name']}','{$_POST['password']}','{$_POST['login']}', '{$_POST['id_role']}')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

  	if ($_SESSION["id_role"]==1){
  		header('Location: main.php');  	
  	}
  	else{
  		if (count($_POST)>0) {
		//potential sql injection, 
		
		$query = "SELECT * FROM `users` WHERE login = '{$_POST['login']}' AND password = '{$_POST['password']}'";
		$res = mysqli_query ($conn,$query);
		$row = mysqli_fetch_array($res);
		if (is_array($row)){
			$_SESSION["id"] = $row["id"];
			$_SESSION["id_role"] = $row["id_role"];
			$_SESSION["login"] = $row["login"];
		} else {
			$_SESSION["id"] = false;
			$_SESSION["id_role"] = false;
			$_SESSION["login"] = false;
			echo "Invalid password";
		}
	}
}


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	header('Location: main.php');

?>