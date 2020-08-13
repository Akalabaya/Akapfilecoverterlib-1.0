<?php
$data = file_get_contents($_GET['url']);
$data = base64_encode($data);
$playload = '{
    "Parameters": [
        {
            "Name": "File",
            "FileValue": {
                "Name": "'.basename($_GET['url']).'",
                "Data": "'.$data.'"
            }
        },
        {
            "Name": "StoreFile",
            "Value": true
        }
    ]
}';

// Prepare new cURL resource
$ch = curl_init('https://v2.convertapi.com/convert/'.$_GET['from'].'/to'.'/'.$_GET['to'].'?Secret=3mI7vWnlb36ozE7A&StoreFile=true');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $playload);

// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($playload))
);

// Submit the POST request
$result = curl_exec($ch);
$output = json_decode($result,true);
header("location:".$output['Files'][0]['Url']);
// Close cURL session handle
curl_close($ch);

?>
