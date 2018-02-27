<?php
include_once 'dbh.inc.php';
$output="";
$session="";
$sql = "SELECT * FROM users WHERE is_admin=0;";
$result = mysqli_query($conn,$sql);
$save = array();
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //echo $row['user_first'] . '<br>';echo(sizeof($row)).'<br>';
        $save[$row['user_id']] = $row['user_uid'];
    }
}

//if(isset($_POST["export_excel"])){
$sql1="SELECT * FROM client ;"; 
$result1=mysqli_query($conn, $sql1);
if(mysqli_num_rows($result1)!=0){
	//echo("All good");
	$flag=0;
	$output.='
	<table class="table" bordered="1">
	<tr>
	<th>Client ID</th>
	<th>Trainer User ID</th>
	<th>Client Name</th>
	<th>Phone Number</th>
	<th>Session</th>
	<th>Cost Per Session</th>
	<th>Payment</th>
	</tr>';
while($row = mysqli_fetch_array($result1)){
	/*$session=$row['session'];
	$session*=$row['cost_per_session'];*/
	$foreign_key = $row['user_uid'];
	$output.='
	<tr>
	<td>'.$row['id'].'</td>
	<td>'.$save[$foreign_key].'</td>
	<td>'.$row['client_name'].'</td>
	<td>'.$row['phone_num'].'</td>
	<td>'.$row['session'].'</td>
	<td>'.$row['cost_per_session'].'</td>
	<td>'.$row['cost_per_session']*$row['session'].'</td>
	</tr>';
}
$output.='</table>';
//$flag=1;
header("Content-Type: application/xls");
header("Content-Disposition:attachment; filename=account.xls");
echo(date("Y/m/d"));
	echo ($output);
	//$flag=1;
}

/*if($flag==1){
	header("Location: ../loggedin.php");
*/

$sql = "UPDATE client
SET session = 0;";
$result = mysqli_query($conn,$sql);
if($result)
{
	//$flag=2;
	//header ("Location: ../loggedin.php");
}	
?>
<html>
<head>
	<meta http-equiv="refresh" content="5">
	</head>
</html>