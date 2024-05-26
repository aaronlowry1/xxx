<?php
header('Content-Type: application/json');

// Retrieve the input data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['query'])) {
    echo json_encode(['error' => 'No query provided']);
    http_response_code(400);
    exit;
}

$query = $data['query'];
$api_key = 'CF5187FF412B4469B8868C3EF10A66CE'; // Replace 'your_api_key' with your actual API key

// Construct the API request URL
$url = 'https://api.scaleserp.com/search?api_key=' . urlencode($api_key) . '&q=' . urlencode($query);

// Set up an HTTP request using cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Send the request and handle the response
$response = curl_exec($ch);

if ($response === false) {
    echo json_encode(['error' => 'API request failed']);
    http_response_code(500);
} else {
    // Echo the API response directly to the client
    echo $response;
}

curl_close($ch);
?>
