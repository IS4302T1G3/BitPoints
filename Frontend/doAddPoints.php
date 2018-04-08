<?php
session_start();

$memberId = $_POST['memberId'];
$points = $_POST['points'];


$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.adminUpdatePoints');

//curl to send http post
curl_setopt($ch, CURLOPT_POST, 1);

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 

 //set data for json
$data = array("\$class" => "org.acme.BitPoint.adminUpdatePoints", "points" => (int) $points, "wallet" => $memberId);
//encode into json format
$data_string = json_encode($data);

//set data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);



header("Location: adminAddPoints.php");

?>