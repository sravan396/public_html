<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create an associative array with the form data
    $data = array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message

    );

    // Specify the path to the JSON file
    $jsonFilePath = 'data.json';

    // Check if the JSON file exists
    if (file_exists($jsonFilePath)) {
        // Read the existing JSON file
        $existingData = json_decode(file_get_contents($jsonFilePath), true);

        // Append the new data to the existing data
        $existingData[] = $data;
    } else {
        // Create a new array with the form data
        $existingData = array($data);
    }

    // Convert the data to JSON with pretty print formatting
    $jsonData = json_encode($existingData, JSON_PRETTY_PRINT);

    // Save the JSON data to the file
    file_put_contents($jsonFilePath, $jsonData);
    header('Location: https://spacekey.in/?status=success');
    exit();
}
?>
    
