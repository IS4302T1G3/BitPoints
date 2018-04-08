<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if(isset($_SESSION)){
	echo 'Welcome ' .$_SESSION['email'].'.';
	$email=$_SESSION['email'];
	$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Member/'.$email);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json'
	)); 
	//return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$result1 = curl_exec($ch);
	$member = json_decode($result1, true);
	
	$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.BitWallet/'.$email);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json'
    )); 

	//return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$result2 = curl_exec($ch);
	$wallet = json_decode($result2, true);
	
	echo '<br>Member ID: '.$member['MemberId'].'.<br>';
	echo 'Points Remaining: '.$wallet['pointBalance'];
	
	
	
}else{
echo "Please login to view this page";
echo '<a href="./login.php">';
}
?>
</body>
</html>