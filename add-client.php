<?php  include "header1.php";
include_once 'includes/dbh.inc.php';
 ?><h2 style="text-align:center">Add a user</h2>
<div class="login-block"> 
		<?php 
$fullURL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(strpos($fullURL, "entry=empty")){
	echo "<h3>You did not fill in all the fields!</h3>";
}
elseif(strpos($fullURL, "enter=fail")){
	echo "<h3>Trainer username does not exist</h3>";
}
?>
<form action="includes/add-client.inc.php" method="POST" target="_self">
	<input type="text" name="trainer-id" placeholder="Enter the trainer id">
	<label for="clientname"></label>
	<input type="text" placeholder="Enter client name" name="clientname" id="clientname">
	<label for="contactnumber"></label>
	<input type="text" placeholder="Enter client's contact number" name="contno" id="contno">
	<label for="numofsessions"></label>
	<input type="tel" name="numofses" id="numofses" placeholder="Enter number of sessions(can be zero)">
	<input type="text" name="cost_per_session" placeholder="Enter the cost per session">
	<!--<input type="submit" name="submit" value="Submit">-->
	<button type="submit" name="submit">Submit</button>
</form>
<a href="loggedin.php" style="text-align:center;padding:15px;padding-bottom:-10px">Back to home</a>
</div>
<?php 
//header ("Location: ../index.php");
?>
<?php include "footer.php"; ?>