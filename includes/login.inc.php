<?php

session_start();

if(isset($_POST['submit']))
{
	include_once 'dbh.inc.php';
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	if(empty($uid)||empty($pwd))
	{
		header("Location: ../index.php?login=empty");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);
		if($result_check!=1)
		{
			header("Location: ../index.php?login=usererror");
			exit();
		} 
		else
		{
			if($row = mysqli_fetch_assoc($result))
			{
				//dehashing the password
				$hashedPwdCheck = password_verify($pwd,$row['user_pwd']);
				if($hashedPwdCheck==false)
				{
					header("Location: ../index.php?login=passworderror");
					exit();
				}
				elseif($hashedPwdCheck==true)
				{
					$_SESSION['u_id' ] = $row['user_id'];
					$_SESSION['u_first' ] = $row['user_first'];
					$_SESSION['u_second' ] = $row['user_second'];
					$_SESSION['u_email' ] = $row['user_email'];
					
					$_SESSION['u_uid' ] = $row['user_uid'];
					$_SESSION['is_admin'] = $row['is_admin'];
					//echo($_SESSION['is_admin']);
					if(($_SESSION['is_admin'])==1)
						header("Location: ../loggedin.php?login=success");
						//header("Location: arrange_database.inc.php");
					else
					header("Location: ../not_admin_client.php?login=success");
					exit();
				}
			}
		}
	}
}
else{
	header("Location: ../index.php?login=error");
	exit();
}
