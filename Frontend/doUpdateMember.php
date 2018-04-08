<?php

$memberId = $_POST['memberId'];
$email = $_POST['email'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$contactNumber = $_POST['contactNumber'];
$address = $_POST['address'];


$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Member/'.$email);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

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


header("Location: getMember.php");


?>