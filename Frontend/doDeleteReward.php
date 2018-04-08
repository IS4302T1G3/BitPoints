<?php

session_start();

$rewardsId = $_POST['rewardId'];



$ch = curl_init('http://localhost:3000/api/org.acme.BitPoint.Reward/'.$rewardsId);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

// set header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json'
    )); 


$result = curl_exec($ch);


echo $result;

header("Location: main.php");
