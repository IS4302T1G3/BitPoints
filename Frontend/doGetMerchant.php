<!DOCTYPE html>
<html>
<body>

<?php
session_start();

$email = $_POST['email'];

$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Merchant/'.$email);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$result = curl_exec($ch);

$member = json_decode($result, true);



?>

<h2>Update Member</h2>

<form action="doUpdateMerchant.php" method ="POST">
  Company Name:
  <input type="text" name="companyName" value=<?php echo $member['companyName'] ?> >
  <br>

  Member ID:
  <input type="text" name="merchantId" value=<?php echo $member['merchantId'] ?> >
  <br>
  
  Email:
  <input type="text" name="email" value=<?php echo $member['email'] ?> >
  <br>
  
  First name:
  <input type="text" name="firstname" value=<?php echo $member['firstName'] ?> >
  <br>
  
  Last name:
  <input type="text" name="lastname" value=<?php echo $member['lastName'] ?> >
  <br>
  
  Contact Number:
  <input type="text" name="contactNumber" value=<?php echo $member['contactNumber'] ?> >
  <br>

  Address:
  <input type="text" name="address" value=<?php echo $member['address'] ?> >
  <br>

  <br><br>
  <input type="submit" value="Update">
</form> 


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>

