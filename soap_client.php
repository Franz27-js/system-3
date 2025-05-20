<?php
// Basic PHP SOAP Client Example

try {
    // Define SOAP service parameters
    $wsdl = 'http://example.com/service?wsdl'; // Replace with actual WSDL URL
    $options = [
        'cache_wsdl' => WSDL_CACHE_NONE,     // Disable WSDL cache during development
        'trace' => 1,                        // Enable trace to get request/response details
        'exceptions' => true                 // Enable exceptions
    ];
    
    // Create the SOAP client
    $client = new SoapClient($wsdl, $options);
    
    // Optional: Set HTTP authentication if needed
    // $client->__setHttpHeader(['Authorization: Basic ' . base64_encode("username:password")]);
    
    // Prepare parameters for the SOAP function call
    $params = [
        'param1' => 'value1',
        'param2' => 'value2'
    ];
    
    // Make the SOAP request
    $response = $client->functionName($params); // Replace 'functionName' with actual function
    
    // Process the response
    echo "Response:\n";
    print_r($response);
    
    // Optional: Debug information
    echo "\nRequest Headers:\n" . $client->__getLastRequestHeaders();
    echo "\nRequest XML:\n" . $client->__getLastRequest();
    echo "\nResponse Headers:\n" . $client->__getLastResponseHeaders();
    echo "\nResponse XML:\n" . $client->__getLastResponse();
    
} catch (SoapFault $fault) {
    // Handle SOAP faults/exceptions
    echo "SOAP Fault: " . $fault->faultcode . " - " . $fault->getMessage();
} catch (Exception $e) {
    // Handle other exceptions
    echo "Error: " . $e->getMessage();
}