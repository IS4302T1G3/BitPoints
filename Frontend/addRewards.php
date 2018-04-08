<!DOCTYPE html>
<html>
<body>

<?php
session_start();

?>

<h2>Add Rewards</h2>

<form action="doAddRewards.php" method ="POST">
  Enter your Email:
  <input type="text" name="merchantEmail">
  <br>
  
  Rewards ID:
  <input type="text" name="rewardsID">
  <br>
  
  Name:
  <input type="text" name="name">
  <br>
  
  Description:
  <textarea name="description"></textarea>
  <br>

  Points Amount:
  <input type="text" name="pointsAmount">
  <br>

  Start Date in dd/mm/yyyy:
  <input type="text" name="startDate">
  <br>

  Quantity:
  <input type="text" name="quantity">
  <br>

  <br><br>
  <input type="submit" value="Submit">
</form> 


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>
