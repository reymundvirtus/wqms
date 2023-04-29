<?php

$tempc = $_GET["tempc"]; // get code value from HTTP GET
$tempf = $_GET["tempf"];
$temppH = $_GET["temppH"];
$tempmoist = $_GET["tempmoist"];
$salanity = $_GET["salanity"];

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://127.0.0.1:8000/api/insert?temperature_c=' . $tempc . '&temperature_f=' . $tempf . '&temperature_pH=' . $temppH . '&temperature_moist=' . $tempmoist . '&temperature_salanity=' . $salanity,
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

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "wqms";
// $port = "3306";

//    // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname, $port);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO temperatures (temperature_c,temperature_f,temperature_pH,temperature_moist,temperature_salinity) VALUES 
//                                 ('$tempc','$tempf','$temppH','$tempmoist', '$salinity')";

// if ($conn->query($sql) === TRUE) {
//     echo "New temperature created successfully! ";
// } else {
//     echo "Error: " . $sql . " => " . $conn->error;
// }

// $conn->close();