<?php

session_start();

$email = $_POST['merchantEmail'];
$rewardsId = $_POST['rewardId'];
$name = $_POST['name'];
$description = $_POST['description'];
$pointsAmount = $_POST['pointsAmount'];
$startDate = $_POST['startDate'];
$quantity = $_POST['quantity'];


$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Reward/'.$rewardsId);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

//set data for json
$data = array("\$class" => "org.acme.BitPoint.Reward",
				"name" => $name, "description" => $description, "pointsAmount" => $pointsAmount,
				"startDate" => $startDate, "quantity" => (int) $quantity, 
				"merchant" => "resource:org.acme.BitPoint.Merchant#".$email);

//encode into json format
$data_string = json_encode($data);

//set data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);


echo $result;

header("Location: main.php");

