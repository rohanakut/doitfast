<link rel="stylesheet" href="style_new.css">
<?php
session_start();
if(isset($_POST['submit']))
{
		include_once 'dbh.inc.php';
		$update_session = mysqli_real_escape_string($conn,$_POST['update_session']);
		$client = mysqli_real_escape_string($conn,$_POST['client_name']);
		$user_id = $_SESSION['u_id'];
		//echo($client);echo($update_session);
		$sql = "UPDATE client SET session=$update_session where id ='".$client."'";
		//mysqli_query($conn,$sql);
		if (mysqli_query($conn, $sql)) {
			header("Location: ../loggedin.php");
    		echo "Record updated successfully";
    	} 
		else 
		{
		header("Location: ../loggedin.php");
    	echo "Error updating record: " . mysqli_error($conn);
		}
}