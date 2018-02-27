<?php
	include_once 'header1.php'
?>
<link rel="stylesheet" type = "text/css" href="style_new.css">
	<section class="main-container">
		<div class="main-wrapper">
		<div class="login-block">
			<h2> Sign Up </h2>
			<?php 
$fullURL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($fullURL, "signup=empty")){
	echo "<h3>You did not fill in all the fields!</h3>";
}
elseif(strpos($fullURL, "signup=invalid")){
	echo "<h3>Incorrect first or last name. Should not contain numbers or characters</h3>";
}
elseif(strpos($fullURL, "signup=email")){
	echo "<h3>Incorrect email ID entered</h3>";
}
elseif(strpos($fullURL, "signup=same")){
	echo "<h3>Username already exists. Please enter another username</h3>";
}
?>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Firstname">
		<input type="text" name="last" placeholder="Lastname">
		<input type="text" name="email" placeholder="E-mail">
		<input type="text" name="uid" placeholder="Username">
		<input type="password" name="pwd" placeholder="Password">
		<button type="submit" name="submit">Sign Up</button>
		<a href="index.php" style="margin-top:5px;margin-left:100px;padding:5px">Back to home</a>
		</form>
	

</div>
		</div>
	</section>
<?php
	include_once 'footer.php'
?>