<?php
include_once 'header1.php'
?>
<!--<section class="main-container">-->
<div class="main-wrapper">

<div class="login-block">
	<h1>Login</h1>
	<?php 
$fullURL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($fullURL, "login=empty")){
	echo "<h3>You did not fill in all the fields!</h3>";
}
elseif(strpos($fullURL, "login=usererror")){
	echo "<h3>Incorrect username or password</h3>";
}
elseif(strpos($fullURL, "login=passworderror")){
	echo "<h3>Incorrect username or password</h3>";
}
?>
	<form action="includes/login.inc.php" method="POST">
	<input type="text" id="username" name="uid" placeholder="username/email"/>
	<input type="password" id="password" name="pwd" placeholder="password"/>
		<button type="submit" name="submit">SUBMIT</button>
	</form>
	<a href="signup.php">Create a new account</a>
</div>
	
</div>
<!--</section>-->
<?php
include_once 'footer.php'
?>
