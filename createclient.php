<?php include "theader.php";
include_once 'dbincludes/dbinc.php';
 ?><h2>Add a user</h2>
<div class="login-block">
<form action="dbincludes/clientsignup.php" method="POST" target="_self">
	<label for="clientname">Client Name</label>
	<input type="text" placeholder="Enter client name" name="clientname" id="clientname">
	<label for="contactnumber">Contact Number</label>
	<input type="tel" placeholder="Enter client's contact number" name="contact" id="tel">
	<label for="numofsessions">Number of Sessions</label>
	<input type="tel" placeholder="Enter Number of Sessions" name="numofses" id="tel">
	<input type="submit" name="submit" value="Submit">
</form>
</div>
<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>