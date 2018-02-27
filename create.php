<?php include "templates/header.php";
include_once 'dbincludes/dbinc.php';
 ?><h2>Add a user</h2>
<div class="login-block">
<form action="dbincludes/signup.php" method="POST" target="_self">
	<label for="firstname">First Name</label>
	<input type="text" placeholder="Enter your first name" name="firstname" id="firstname">
	<label for="lastname">Last Name</label>
	<input type="text" placeholder="Enter your last name" name="lastname" id="lastname">
	<label for="email">Email Address</label>
	<input type="email" placeholder= "Enter email-ID" name="email" id="email">
	<label for="tel">Contact Number</label>
	<input type="tel" placeholder="Enter Contact Number" name="mobnumber" id="tel">
	<label for="username">Enter Username</label>
	<input type="text" name="username" id="username">
	<label for="password">Enter your Password</label>
	<input type="password" placeholder="Enter Password" name="password" id="password">
	<input type="submit" name="submit" value="Submit">
	</form>
</div>
<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>