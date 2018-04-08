<!DOCTYPE html>
<html>

<?php
session_start();

if($_SESSION['role'] == "user") {
	echo "Unauthorised Access!!";

}
else{

echo '
<h2>Add Points</h2>

<br>Enter the member email to issue points.<br>

<form action="doAddPoints.php" method="POST">

Member email:
<input type="text" name="memberId"><br>
<br>
Points to issue:
<input type="text" name="points"><br>

<input type="submit" value="Submit">

<br>
<a href="main.php">Back to Main page</a><br>

';



}

?>

</body>
</html>

