<?php


$memberId = $_POST['memberId'];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$contactNumber = $_POST['contactNumber'];
$address = $_POST['address'];


$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Member');

//curl to send http post
curl_setopt($ch, CURLOPT_POST, 1);

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//set data for json
$data = array("\$class" => "org.acme.BitPoint.Member", "memberId" => $memberId,
				"email" => $email, "firstName" => $firstName, "lastName" => $lastName,
				"contactNumber" => $contactNumber , "address" => $address);

//encode into json format
$data_string = json_encode($data);

//set data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);


//create BitWallet for member
$ch2 = curl_init('http://localhost:3000/api/org.acme.BitPoint.Bitwallet');

curl_setopt($ch2, CURLOPT_POST, 1);

curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

$data2 = array("\$class" => "org.acme.BitPoint.Bitwallet", "owner" => "resource:org.acme.BitPoint.Member#".$email,
				"walletId" => $memberId, "pointBalance" => 0);

//encode into json format
$data_string2 = json_encode($data2);

//set data
curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string2);

$result2 = curl_exec($ch2);

header("Location: main.php");


?>