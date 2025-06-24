<?php
// Basic PHP SOAP Client Example

$post_data = $_POST['dobot_button'] ?? 'no_data_received';

// Minimal test with the exact SOAP format DOBOT expects
$soapRequest = '<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:daf="http://DaFraDa/">
   <soapenv:Header/>
   <soapenv:Body>
      <daf:StartDobotProgram/>
   </soapenv:Body>
</soapenv:Envelope>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://10.62.2.202:8080/DOBOT_WS/Main?wsdl');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/xml; charset=UTF-8',
    'SOAPAction: ""',
    'Content-Length: ' . strlen($soapRequest)
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "HTTP Code: $httpCode\n";
echo "Response: $response\n";

curl_close($ch);

header('Location: .');