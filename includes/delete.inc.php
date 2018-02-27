<?php
include_once 'dbh.inc.php';
if(isset($_POST['delete'])){
$delete = mysqli_real_escape_string($conn,$_POST['delete']);
$sql = "DELETE FROM client WHERE id='".$delete."'";
if (mysqli_query($conn, $sql)) {
			header("Location: ../loggedin.php");
    		echo "Record updated successfully";
    	} 
		else 
		{
		header("Location: ../loggedin.php");
    	echo "Error updating record: " . mysqli_error($conn);
		}
//echo($delete);
}
//$sql = "DELETE FROM client WHERE client_name="'.$delete.'""
?>