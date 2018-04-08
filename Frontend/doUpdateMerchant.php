<?php

$companyName = $_POST['companyName'];
$merchantId = $_POST['merchantId'];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$contactNumber = $_POST['contactNumber'];
$address = $_POST['address'];


$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Merchant/'.$email);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//set data for json
$data = array("\$class" => "org.acme.BitPoint.Merchant","CompanyName" => $companyName, "MerchantId" => $merchantId,
				"email" => $email, "firstName" => $firstName, "lastName" => $lastName,
				"contactNumber" => $contactNumber , "Address" => $address);

//encode into json format
$data_string = json_encode($data);

//set data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);


header("Location: getMerchant.php");


?>