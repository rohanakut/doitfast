<?php
//include_once 'header.php';
include_once 'dbh.inc.php';
session_start();
$flag=0;
if(isset($_POST['submit']))
{
	$flag=0;
	$trainer_uid  = mysqli_real_escape_string($conn,$_POST['trainer-id']);
	$clientname = mysqli_real_escape_string($conn,$_POST['clientname']);
	$clnum = mysqli_real_escape_string($conn,$_POST['contno']);
	$session = mysqli_real_escape_string($conn,$_POST['numofses']);
	$cost_per_session = mysqli_real_escape_string($conn,$_POST['cost_per_session']);
	//$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	//$clnum = mysqli_real_escape_string($conn,$_POST['clmobnumber']);
	$user_uid = $_SESSION['u_id'];
	//echo($trainer_uid);
	$session+=1;
	if(empty($clientname)||empty($session)||empty($clnum)||empty($trainer_uid))
	{
		header("Location:../add-client.php?entry=empty");
		exit();
	}
	else
	{
		$session-=1;
		$sql = "SELECT * FROM users WHERE user_uid='$trainer_uid';";
		$result = mysqli_query($conn,$sql);
		$row=array();
		$result_check = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if($result_check==0){
			header("Location:../loggedin.php?entry=invalid");
		}
		$trainer_id = $row['user_id'];
		//echo($trainer_id);echo($clientname);echo($session);
		$sql = "INSERT INTO  client (user_uid, client_name, phone_num, session,cost_per_session) VALUES ($trainer_id ,'$clientname','$clnum','$session','$cost_per_session');";
		$result = mysqli_query($conn,$sql);
		//echo($result);
		if($result)
		header("Location: ../loggedin.php?enter=success");
		else
		header("Location: ../add-client.php?enter=fail");
		

	}
//	include_once 'footer.php';
}