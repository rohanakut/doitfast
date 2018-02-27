<?php
   //include("config.php");
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'login');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT userid FROM login WHERE userid = '$myusername' and PASSWORD = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<h1>
Login page
</h1>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="border" >
<div id="form-wrapper">
<form>
<div id="form-text">
<div id="id">
<input type="text" name="username" id="userid" placeholder ="enter the id" style="padding:5px;border-width:3px"/><br>
</div>
<div id="password">
<input type = "password" name="password" id="PASSWORD" placeholder ="enter the password" style="padding:5px;border-width:3px"/>
</div>
</form>
</div>
<div id="forgot-password" >
<p >
forgot password?click here
</p>
</div>
<div id="wrapper">
<button type="button" name="submit" id="submit">
Login</button>
</div>
</div>
</div>
</html>

