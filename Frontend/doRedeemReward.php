<?php


session_start();

$rewardID = $_POST['rewardId'];
$email = $_SESSION['email'];

$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.memberRedeemRewards');

//curl to send http post
curl_setopt($ch, CURLOPT_POST, 1);

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
    )); 


//set data for json
$data = array("\$class" => "org.acme.BitPoint.memberRedeemRewards", "rewards" => "resource:org.acme.BitPoint.Reward#".$rewardID,
				"wallet" => $email);

//encode into json format
$data_string = json_encode($data);

//set data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$result = curl_exec($ch);

?>