<!DOCTYPE html>
<html>
<body>

<style>
table, th, td {
   border: 1px solid black;
}
</style>

<?php
session_start();

$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Member');


curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

$result = curl_exec($ch);

$member = json_decode($result, true);

?>


<h2> All Members </h2>
<table>
 <tr>
	<th>Member ID</th>
	<th>Email</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Contact Number</th>
	<th>Address</th>
 </tr>
 <?php foreach($member as $i){  ?>
 <tr>
 	<th><?php echo $i['MemberId']; ?></th>
 	<th><?php echo $i['email']; ?></th>
 	<th><?php echo $i['firstName']; ?></th>
 	<th><?php echo $i['lastName']; ?></th>
 	<th><?php echo $i['contactNumber']; ?></th>
 	<th><?php echo $i['Address']; ?></th>
 </tr>	
 <?php } ?>

</table>	


<br>
<a href="main.php">Back to Main page</a><br>

</body>
</html>