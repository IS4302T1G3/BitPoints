<!DOCTYPE html>
<html>
<body>

<?php
session_start();
?>

<h2>Add Merchant</h2>

<form action="admincreatemerchant.php" method ="POST">
  Company Name:
  <input type="text" name="companyName">
  <br>
  Member ID:
  <input type="text" name="merchantId">
  <br>
  
  Email:
  <input type="text" name="email">
  <br>
  
  First name:
  <input type="text" name="firstname">
  <br>
  
  Last name:
  <input type="text" name="lastname">
  <br>
  
  Contact Number:
  <input type="text" name="contactNumber">
  <br>

  Address:
  <input type="text" name="address">
  <br>

  <br><br>
  <input type="submit" value="Submit">
</form> 


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>

