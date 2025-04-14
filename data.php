<?php
header('Content-Type: application/json');
$dataFile = 'data.json';

// If this is a POST request, update the data file with the incoming JSON.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the raw POST data
    $json = file_get_contents('php://input');
    // (Optionally, add validation/sanitization here)
    file_put_contents($dataFile, $json);
    echo json_encode(["status" => "success"]);
    exit;
}

// If it’s a GET request, simply read and output the content of data.json.
if (file_exists($dataFile)) {
    echo file_get_contents($dataFile);
} else {
    echo json_encode(["error" => "Data file not found."]);
}
?>
