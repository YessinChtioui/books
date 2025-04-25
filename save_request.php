<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $csvData = [
        $data['name'],
        $data['email'],
        $data['bookTitle'],
        $data['timestamp']
    ];
    
    $fp = fopen('book_requests.csv', 'a');
    fputcsv($fp, $csvData);
    fclose($fp);
    
    echo "Request saved successfully";
} else {
    http_response_code(405);
    echo "Method not allowed";
}
?>