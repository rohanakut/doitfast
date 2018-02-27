<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="login";
$connect=mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$output="";
$session="";
if(isset($_POST["export_excel"])){
$sql="SELECT * FROM client;"; 
$result=mysqli_query($connect, $sql);
if(mysqli_num_rows($result)!=0){
	//echo("All good");
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
	
while($row = mysqli_fetch_array($result)){
	/*$session=$row['session'];
	$session*=$row['cost_per_session'];*/
	$output.='
	<tr>
	<td>'.$row['id'].'</td>
	<td>'.$row['user_uid'].'</td>
	<td>'.$row['client_name'].'</td>
	<td>'.$row['phone_num'].'</td>
	<td>'.$row['session'].'</td>
	<td>'.$row['cost_per_session'].'</td>
	<td>'.$row['cost_per_session']*$row['session'].'</td>
	</tr>';
}
$output.='</table>';
header("Content-Type: application/xls");
header("Content-Disposition:attachment; filename=account.xls");
echo(date("Y/m/d"));
	echo ($output);
	}


}









?>