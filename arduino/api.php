<?php

$tempC = $_GET["tempC"]; // get code value from HTTP GET
$tempF = $_GET["tempF"];
$temppH = $_GET["temppH"];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://127.0.0.1:8000/api/insert?temperature_c=' . $tempC . '&temperature_f=' . $tempF . '&temperature_pH=' . $temppH,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
