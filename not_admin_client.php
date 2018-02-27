<style>
body {
    background: url('https://images.unsplash.com/photo-1501116518234-f32f28802bd1?auto=format&fit=crop&w=948&q=80' ) no-repeat fixed center center;
    background-size: cover;
 	height:100%;
    font-family: Montserrat;
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
    font-size: 150%;
}
th{
	border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
    background-color: #8BB7A4  ;/*#4CAF50*/
    color: white;		
}
#logout-button{
	margin-left: 60%;
	display: block;
}
#logout-button button{
	position: absolute;
	margin-top: 25px;
	background-color: #8BB7A4;
	height: 50px;
	width: 150px;
	border-radius: 10px;
	font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    border: 1px solid ;
    color: #fff;
    font-family: Montserrat;	
}
#add-client{
	margin-left:25%;
	display: block;
	position:absolute;
	margin-top: 40px;
	background-color: #8BB7A4;
	height: 50px;
	width: 150px;
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
input[type="checkbox"]
{
	cursor : pointer;
	appearance: none;
	background: #34495E;
	border-radius: 1px;
	box-sizing: border-box;
	box-sizing: content-box ;
	width: 30px;
	height: 30px;
	border-width: 0;
	transition: all .3s linear;
}
input[type="checkbox"]:focus{
  outline: 0 none;
  box-shadow: none;
}
input[type="checkbox"]:checked{
  background-color: #2ECC71;
}
</style>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=0.8">
</head>
<?php
session_start();
include_once 'includes/dbh.inc.php';
if(($_SESSION['is_admin'])==0)
{ 
	echo'<div class="title" style="text-align:center;color: black;font-size:20px;"> <h1>Welcome '."{$_SESSION['u_first']}".'!!</h1>'.'</div>';
	?>
	<html>
		<table>
			<th>Client Name</th>
			<th></th>
<?php
	$user_id = $_SESSION['u_id'];
	$sql = "SELECT * FROM client WHERE client.user_uid= $user_id;";
	$result = mysqli_query($conn,$sql); 
	//$check_list = array();
	if($result)
	{
		$row = array();
		while($row = mysqli_fetch_array($result))
		{ ?><form action="includes/change_session_not_admin.inc.php" method="POST">
			<tr>
				<td>
				<?php
					echo"{$row['client_name']}";
				?>
				</td>
				<td>
					<input type="checkbox" name="check_list[]" value="<?php echo $row['id']; ?>">
				</td>
			</tr>
<?php
		}
	}
	?>
</table>

	<button type="submit" id="add-client" name="submit">Update </button>
	<!--<input type="hidden" name="result"value="<?php //echo $check_id;?>">-->
</form>
<?php
		if(isset($_SESSION['u_id'])){
			echo '<div id="logout-button"><form action="includes/logout.inc.php" method="POST">
				<button type="submit " name="submit">Logout</button>
				</form></div>';
		}
		?>
<?php
//$my_array=array('cat', 'dog', 'mouse', 'bird', 'crocodile', 'wombat', 'koala', 'kangaroo');
//$_SESSION['not_admin_client'] = $check_list;
{?>
<!--	<button type="submit" name="submit">Update </button>
	<!--<input type="hidden" name="result"value="<?php //echo $check_id;?>">
</form>-->
<?php
}
?>
</html>
<?php
}
?>
