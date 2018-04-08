<!DOCTYPE html>
<html>
<body>

<?php
session_start();

$rewardId = $_POST['rewardId'];

$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Reward/'.$rewardId);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$result = curl_exec($ch);

$reward = json_decode($result, true);


?>

<h2>Update Member</h2>

<form action="doUpdateReward.php" method ="POST">  
 Name:
  <input type="text" name="name" value=<?php echo $reward['name'] ?> >
  <br>
  
  Description:
  <textarea name="description"><?php echo $reward['description'] ?></textarea> 
  <br>
  
  Points Amount:
  <input type="text" name="pointsAmount" value=<?php echo $reward['pointsAmount'] ?> >
  <br>

  Start Date:
  <input type="text" name="startDate" value=<?php echo $reward['startDate'] ?> >
  <br>

  Quantity
  <input type="text" name="quantity" value=<?php echo $reward['quantity'] ?> >
  <br>

  <input type="hidden" name="rewardId" value=<?php echo $rewardId; ?> > 
  <input type="hidden" name="merchantEmail" value=<?php echo $_SESSION['email']; ?> > 

  <br><br>
  <input type="submit" value="Update">
</form> 

<form action="doDeleteReward.php" method="POST">

<input type="hidden" name="rewardId" value=<?php echo $rewardId; ?> > 
<input type="submit" value="Delete">

</form>  


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>