<?php
include_once 'header.php'
?>
<style>
body {
    background: url('https://images.unsplash.com/photo-1501116518234-f32f28802bd1?auto=format&fit=crop&w=948&q=80' ) no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
    height:100%;
}

tr:nth-child(even) {
    background-color:white;
}
table  {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left: 25%;
    text-align: right;

}
tr{
	background-color: #8BB7A4  ;
}
 td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
th{
	border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
    background-color: #8BB7A4  ;/*#4CAF50*/
    color: white;		
}
#logout-button{
	margin-left: 55%;

}
#logout-button button{
	position: absolute;
	margin-top: 25px;
	background-color: #8BB7A4;
	height: 50px;
	width: 100px;
	margin-left:10%;
	border-radius: 10px;
	font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    border: 1px solid ;
    color: #fff;
    font-family: Montserrat;	
}
#add-client{
	position: absolute;
	margin-left:45%;
	margin-top: 25px;
	background-color: #8BB7A4;
	height: 50px;
	width: 100px;
	border-radius: 10px;
	font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    border: 1px solid ;
    color: #fff;
    font-family: Montserrat;	
}
#change-month{
	margin-left:25%;
	position:absolute;
	margin-top: 25px;
	background-color: #8BB7A4;
	height: 50px;
	width: 100px;
	border-radius: 10px;
	font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    border: 1px solid ;
    color: #fff;
    font-family: Montserrat;	
}
#update{
	background-color: #8BB7A4;
	height: 25px;
	width: 100px;
	border-radius: 10px;
	font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    border: 1px solid ;
    color: #fff;
    font-family: Montserrat;
    margin-left: -10px;	
}
#formupdate input{
	margin-left: -10px;
	height: 25px;
}
</style>
<head>
	<meta name="viewport" content="width=800, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<table>
<tr>
<th></th>
<th>Trainer Name</th>
<th>Client Name</th>
<th>Number of Sessions </th>
<th>Phone Number</th>
<th> Total Cost</th>
<!--<th></th>-->
</tr>
<?php
include_once 'includes/client.inc.php';
$sql = "SELECT * FROM users WHERE is_admin=0;";
$result = mysqli_query($connection,$sql);
$save = array();
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        //echo $row['user_first'] . '<br>';echo(sizeof($row)).'<br>';
        $save[$row['user_id']] = $row['user_uid'];
    }
}
/*foreach($save as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}*/


$sql = 'SELECT * FROM client 
        ORDER BY user_uid';

$result = mysqli_query($connection, $sql);
//ORDER BY (INSERT NAME OF COLUMN OF TRAINER NAME/ USERNAME)
echo'<div class="title" style="text-align:center;color: black;font-size:20px;"> <h1>Welcome '."{$_SESSION['u_first']}".'!!</h1>'.'</div>';
$user_id = $_SESSION['u_id'];
//$sql = "SELECT * FROM client ;";
//$result = mysqli_query($connection,$sql); 
if(($result))
{
	$row = array();
	while($row = mysqli_fetch_array($result)){
		//$trainer = "SELECT * FROM users WHERE user_id='{$row['user_uid']}';";
		?>
		<html>
		<tr> <td><form action="includes/delete.inc.php" method="POST"><button name="delete" style="border-radius:50px"value="<?php echo $row['id']; ?>"><i class="fa fa-remove"></i></button></form></td>
		</html>
		<?php
		$session = $row['session'];
		$cost_per_session = $row['cost_per_session'];
		$session*=$cost_per_session;
		$foreign_key = $row['user_uid'];
		//echo($foreign_key);
		?>
		<?php echo "<td>"."{$save[$foreign_key]}"."</td>"."<td>"."{$row['client_name']}"."</td>"."<td>"."{$row['session']}"."</td>"."<td>"."{$row['phone_num']}".'</td>'.'<td>'."{$session}";//.'<td>'.'<form id="formupdate" action="">'.'<input placehloder="session">'.'<button name = "update" type="submit" id="update"> UPDATE </button></td></tr>'."</tr>";		
		$client_name = $row['id'];	
	?>
	<html>
	<!--<td><form id="formupdate" action="includes/update_session.inc.php"  method="POST">
		<input type="hidden" name="client_name" value="<?php //echo $row[//'id']; ?>"><input name="update_session"placeholder="enter the sessions">
	<button id="update" name="submit"> submit</button></form></td>-->
	</tr><!--<td><input type="text" style="margin:2px;padding:5px"><br><input type="text"style="margin:5px;padding:5px"><br><input type="text"style="margin:5px;padding:5px"></td></tr>-->
	<html>
	<?php
	}
}
?>

</table>
</html>
<?php
		if(isset($_SESSION['u_id'])){
			echo '<div id="logout-button"><form action="includes/logout.inc.php" method="POST">
				<button type="submit " name="submit">Logout</button>
				</form></div>';
		}
		?>
<html>
<form  action="add-client.php">
<button id="add-client">Add a new client</button>
</form>
<form action="includes/change_month.inc.php">
	<button id="change-month">End of the month</button>
</form>
</html>
<?php
include_once 'footer.php';
?>