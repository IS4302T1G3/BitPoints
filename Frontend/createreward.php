<html>
<body>
<title>Create RewardsList</title>
<form action="?" method="POST">
rewardsId: <input type="text" name="rewardsId">
<br>
name: <input type="text" name="name">
<br>
description:<input type="text" name="description">
<br>
pointsAmount: <input type="text" name="pointAmount">
<br>
StartDate: <input type="date" name="startDate">
<br>
Quantity: <input type="Integer" name="quantity">
<br>
merchantId: <input type="text" name="merchantId>
<button id="sendMessageButton" type="submit" name="create" value="Submit">Submit</button>
</form>

<?php
session_start();
require 'connect.php';

$rewardsId=$_POST['rewardsId'];
$name=$_POST['name'];
$description=$_POST['description'];
$pointAmount=$_POST['pointAmount'];
$startDate=$_POST['startDate'];
$quantity=$_POST['quantity'];
$merchantId=$_POST['merchantId'];
//$owner="a@b.com";
//$walletId="312312";
//$pointBalance="7118";


$ch = curl_init(); 


curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/api/org.acme.BitPoint.Reward"); 
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' , 'Accept: application/json'));
$data= array("\$class" => "org.acme.BitPoint.Reward", "rewardsId" => $rewardsId, "name" => $name, "description" => $description, "pointAmount" => $pointAmount, "startDate"=>$startDate, "quantity"=> $quantity, "merchant"=> $merchantId);
$data_string=json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);


$output = curl_exec($ch); 
echo $output;
curl_close($ch);  
 



?>
</body>
</html>

 

