<?php
if(isset($_POST['submit']))
{
	include_once 'dbh.inc.php';
	/*take content from from and store it in variable*/
	$first = mysqli_real_escape_string($conn,$_POST['first']);
	$last = mysqli_real_escape_string($conn,$_POST['last']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
//debug_to_console("hello");	
if(empty($first)||empty($last)||empty($email)||empty($uid)||empty($pwd))
{
	header("Location:../signup.php?signup=empty");
	exit();
}
else
{
	//check for validity
	if(!preg_match("/^[a-zA-Z1-9]*$/",$first)||!preg_match("/^[a-zA-Z1-9]*$/",$last))
	{ 
		header("Location: ../signup.php?signup=invalid");
 		exit();
		
	}
	else
	{
		//check for email
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			header("Location: ../signup.php?signup=email");
			exit();
		}
		else
		{
			$sql = "SELECT * FROM user WHERE user_uid='$uid';";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck!=0)
			{
				header("Location: ../signup.php?signup=usertaken");
				exit();
			}
			else
			{
				//hashing
				//$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
				$hashedPwd = $pwd;
				//insert the user
				$sql="INSERT INTO users (user_first,user_second,user_email,user_uid,user_pwd) VALUES ('$first','$last','$email','$uid','$hashedPwd');";
				if(mysqli_query($conn,$sql))
				header("Location: ../index.php?signup=success");
				else
				header("Location:../signup.php?signup=same");
				exit();
			}
			
		}
	}
}
	
}
else{
	header("Location: ../signup.php");
	exit();
}