<html>
<table>
	<tr>
		<th>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'dbh.inc.php';
$sql = "SELECT * FROM users WHERE is_admin=0;";
$result = mysqli_query($conn,$sql);
$save = array();
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo $row['user_first'] . '<br>';echo(sizeof($row)).'<br>';
        $save[$row['user_id']] = $row['user_first'];
    }
}
//sizeof($row)
$sql = 'SELECT * FROM client 
        ORDER BY user_uid';

$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo $row['client_name'] . '<br>';
    }
}
//echo(sizeof($save));
/*while($i<sizeof($save))
{
	echo($save[$i]).'<br';	
	$i++;
}*/	
foreach($save as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

