<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="assets/css/layout.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="assets/js/function.js"></script>
<style type="text/css">
   body{
background: url(https://html5book.ru/wp-content/uploads/2015/07/background47.jpg);
   }
</style>
</head>
<body style="padding-top: 3rem;">

<div class="butt">
	<?php if (empty($_SESSION["login"])): ?>
		<a href = "" type='submit' value ='SingIn' id='loginLink'  class='bttn' >Sing In</a>
		<a href= 'registr.php' type='submit' value ='SingUp'  class='bttn'>Sing Up</a>
	<?php endif;?>

	<?php if (!empty($_SESSION["login"])): ?>
		<a href="user.php?id=<?php echo $_SESSION["id"]?>" type='submit' value ="<?php echo$_SESSION['login']?>" class="bttn" >User</a>
		<a href= 'out.php'  type='submit' value ='SingOut'  class='bttn'>Sing Out</a>
	<?php endif;?>     
 </div>  

<div class="tableData">
	<table>
	<caption><b>USERS</b></caption>
	<tr><th>#</th><th>First Name</th><th>Last Name</th><th>Login</th><th>Role</th><th>Photo</th></tr>

	<?php 
        require_once "db.php";

        $sql = "SELECT u.id, u.first_name, u.last_name, u.login, r.title, u.photo FROM users u, roles r WHERE u.id_role = r.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    	while ($row = mysqli_fetch_row($result)) {
		echo "<tr>";		
		echo "<td><a href='user.php?id=" . $row[0]. "'>" . $row[0]. "</a></td>";
			for ($j = 1 ; $j < 5 ; ++$j){ echo "<td>$row[$j]</td>";}
				echo "<td><img src= public/images/" .$row[5]." style='width:100px'></img></td>";
				echo "</tr>";
	}
        }
     ?>
	</table>
</div>
<div class="test"></div>
<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content" id="loginTarget">
        <div class="close">
	    <div>
	        <div class="leftright"></div>
	        <div class="rightleft"></div>
	        <span class="close"></span>
	    </div>
	</div>    
	<h3>Sign in</h3>	
	
            <form method="post" action="auth.php">
                <label for="login">
                    Login:
                    <input type="text" name="login" id="login" placeholder="Login" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,20}$" required />
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="не менее 6 символов" pattern="(?=^.{6,}$).*$" required />
                </label>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>