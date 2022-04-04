<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost/lab9/api.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "Dentist=A&");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
$server_output = json_decode($server_output);
curl_close ($ch);
//print_r($server_output);

foreach ($server_output as $key => $value) {
    echo "Key: $key; Value: $value\n";
}
?>
