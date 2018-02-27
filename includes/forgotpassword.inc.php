<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="login";
$connect=mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if(isset($_POST['submit'])){
	$traineruid=mysqli_real_escape_string($connect, $_POST['traineruid']);
	echo($traineruid);
	$sql="SELECT * FROM `users` WHERE user_uid='$traineruid';";
	$result=mysqli_query($connect, $sql);
	$count = mysqli_num_rows($result);
	if($count!=0){
		echo("An email with the password will has been sent to the registered email ID");		
		$r = mysqli_fetch_assoc($result);
$password = $r['user_pwd'];
$to = $r['user_email'];
$subject = "Your Recovered Password";
 
$message = "Please use this password to login " . $password;
$headers = "From: support@doitfast.com";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed to Recover your password, try again";
}
		}else{
			echo("The entered username does not exist");
		}

}


?>
