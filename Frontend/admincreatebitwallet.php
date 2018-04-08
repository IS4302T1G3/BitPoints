<html>
<body>
<title>Create Bitwallet</title>
<form action="?" method="POST">
Owner: <input type="text" name="owner">
<br>
walletId: <input type="text" name="walletId">
<br>
pointBalance: <input type="text" name="pointBalance">
<button id="sendMessageButton" type="submit" name="create" value="Submit">Submit</button>
</form>

<?php
session_start();
require 'connect.php';

$owner=$_POST['owner'];
$walletId=$_POST['walletId'];
$pointBalance=$_POST['pointBalance'];
//$owner="a@b.com";
//$walletId="312312";
//$pointBalance="7118";


$ch = curl_init(); 


curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/api/org.acme.BitPoint.Bitwallet"); 
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' , 'Accept: application/json'));
$data= array("\$class" => "org.acme.BitPoint.Bitwallet", "owner" => $owner, "walletId" => $walletId, "pointBalance" => $pointBalance);
$data_string=json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);


$output = curl_exec($ch); 
echo $output;
curl_close($ch);  
 



?>
</body>
</html>

 