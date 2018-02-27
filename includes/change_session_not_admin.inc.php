<?php
session_start();
if(isset($_POST['submit'])&&!empty($_POST['check_list']))
{
	include_once 'dbh.inc.php';
	$check_id_array = $_POST['check_list'];
	//echo(sizeof($check_id_array));
	$user_uid = $_SESSION['u_id'];
	$i=0;
	while($i<sizeof($check_id_array))
	{
		//echo($check_id_array[$i]);
		$sql = "SELECT * FROM client WHERE client.id= $check_id_array[$i];";
		$result = mysqli_query($conn,$sql); 
		//echo($result);
		$row = array();
		$row = mysqli_fetch_array($result);
		$session = $row['session'];
		$id = $check_id_array[$i];
		echo($session);
		$sql_new = " UPDATE client SET session=$session+1 where id = '".$id."' ";
		if(mysqli_query($conn,$sql_new))
			header("Location: ../not_admin_client.php");
		else
			header("Location: ../not_admin_client.php?update=failed");
		//echo($check_id_array[$i]);
		//echo '<br>';
		//$sql = "UPDATE client SET session=$update_session where id ='".$client."'";
		$i++;
	}	
}
else
header("Location: ../not_admin_client.php?update=nothingselected");