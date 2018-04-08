<?php

$companyName = $_POST['companyName'];
$memberId = $_POST['merchantId'];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$contactNumber = $_POST['contactNumber'];
$address = $_POST['address'];


$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Merchant');

//curl to send http post
curl_setopt($ch, CURLOPT_POST, 1);

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//set data for json
$data = array("\$class" => "org.acme.BitPoint.Merchant", "companyName" => $companyName,"merchantId" => $memberId,
				"email" => $email, "firstName" => $firstName, "lastName" => $lastName,
				"contactNumber" => $contactNumber , "address" => $address);

//encode into json format
$data_string = json_encode($data);

//set data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);

header("Location: main.php");


?>

 