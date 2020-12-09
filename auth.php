<?php
session_start();
?>
<?php
	require_once "db.php";
	if (count($_POST)>0) {
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
	header('Location: main.php');
?>
 
