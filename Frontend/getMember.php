<!DOCTYPE html>
<html>
<body>

<?php
session_start();

?>
<h2>Edit Member Details</h2>
Enter the email address of the member to retrieve its details


<form action="doGetMember.php" method ="POST">
  Email:
  <input type="text" name="email">
  
  <br><br>
  <input type="submit" value="Retrieve">
</form> 


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>
