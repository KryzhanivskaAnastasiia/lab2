<form action="user.php?id='.$_GET['id']" method="post" enctype="multipart/form-data">	
<?php session_start();
	require_once "db.php";


if(!empty($_FILES['path']['name'])){

	$file = "public/images/".$_FILES['path']['name'];
 	copy($_FILES['path']['tmp_name'], $file);
  	$sql = "UPDATE `users` SET `photo`='{$_FILES['path']['name']}' WHERE id = '{$_GET['id']}'";
	if ($conn->query($sql) === TRUE) {
		echo "Загруженный файл: ".$_FILES['path']['name']."</br>";
		echo "Размер: ".$_FILES['path']['size']."байт";
	}
}
	header('Location: user.php?id='.$_GET['id']);

?>
</form>