<!DOCTYPE html>
<html>
<body>

<?php
session_start();

?>
<h2>Retrieve A Reward information </h2>
Enter the Reward ID to delete the reward.


<form action="doGetReward.php" method ="POST">
  Reward Id:
  <input type="text" name="rewardId">
  
  <br><br>
  <input type="submit" value="Retrieve">
</form> 


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>
