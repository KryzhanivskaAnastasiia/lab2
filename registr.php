<?php session_start();
 require_once "db.php";
?>

<!doctype html>
<html lang="en">
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
        <a  href="main.php" type='submit' value ='Back'   class='bttn' >Back</a>
        <?php if ($_SESSION["id_role"]!=1): ?>
            <a type="submit" value ="SingIn" id="loginLink"   class="bttn" >Sing In</a>
        <?php endif;?>

      </div>

<div class="container">
   <form action="addNewUser.php" method="post">
		First Name: <input type="text" name="first_name" placeholder= "only a-z, A-Z" pattern="^[A-Za-zА-Яа-яЁё]{1,20}$" required/><br>
		Last Name: <input type="text" name="last_name" placeholder= "only a-z, A-Z " pattern="^[A-Za-zА-Яа-яЁё]{1,20}$" required/><br>
    Login: <input type="text" name="login" placeholder= "at least 6 symbols, form 0 to 9, a-z, A-Z " pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,20}$" required/><br>
        Password: <input type="password" name="password" placeholder= "at least 6 symbols"  pattern="(?=^.{6,}$).*$" required/><br>
		 <select size="1" name = "id_role">
          <option selected disabled>Select Role</option>
          <?php 
          $query1 = "SELECT `id`,`title` FROM `roles`";
          $roleRes = $conn->query($query1);
          if ($roleRes->num_rows > 0) {
              // output data of each rowі
                  while($roles = $roleRes->fetch_assoc()) {
                  echo "<option ";
                  echo "value='";
                  echo $roles['id'];
                  echo "'>";
                  echo $roles['title'];
                    echo "</option>";                   
                      }
                  } 
        ?>
      </select><br>
       <button href = "" type="submit" value ='SingOut'  class = 'bttn'>Send</button>
   </form>
</div>


<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content" id="loginTarget">

            <h3>Sign in	</h3>	
	<div class="close">
	    <div>
	        <div class="leftright"></div>
	        <div class="rightleft"></div>
	        <span class="close"></span>
	    </div>
	</div>
            <form method="post" action="auth.php">
                <label for="login">
                    Login:
                    <input type="text" name="login" id="login" placeholder="Login" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,20}$" required />
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="At least 6 symbols" pattern="(?=^.{6,}$).*$" required />
                </label>
                <button href = "" type="submit" value ='SingOut'  class = 'bttn'>Sign in</button>
            </form>
        </div>
    </div>
</div>>


</body>
</html>
