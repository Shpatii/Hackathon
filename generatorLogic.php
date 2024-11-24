<?php

function loadEnv($filePath)
{
    if (!file_exists($filePath)) {
        throw new Exception("The .env file does not exist.");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignore comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Parse key-value pairs
        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        // Remove quotes if present
        $value = trim($value, '"\'');
        
        // Set environment variable
        $_ENV[$key] = $value;
    }
}

try {
    loadEnv(__DIR__ . '/.env');
    
    // Access the API key
    $apiKey = $_ENV['OPEN_AI_KEY'] ?? null;

    if (!$apiKey) {
        die("API key not found. Please check your .env file.");
    }
    file_put_contents('debug.log', "API Key loaded successfully.\n", FILE_APPEND);


} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
// Function to interact with OpenAI API
function generateImage($prompt) {
    global $apiKey;  // Ensure the $api_key is available inside the function
    
    $url = 'https://api.openai.com/v1/images/generations';

    // Set up the cURL request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'prompt' => $prompt,
        'n' => 1,  // Number of images to generate
        'size' => '512x512',  // Image size
    ]));
    
    // Set the authorization header
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey  // Correct usage of the API key
    ]);

    // Execute the request and get the response
    $response = curl_exec($ch);
    
    if ($response === false) {
        echo 'Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch);
    }
    
    curl_close($ch);

    // Decode the response JSON
    $response_data = json_decode($response, true);

    // Check if the 'data' key exists in the response
    if (isset($response_data['data']) && is_array($response_data['data'])) {
        // Return the image URL
        return $response_data['data'][0]['url'];
    } else {
        // Handle API errors or empty response
        echo 'Error: Unable to generate image. Response: ' . $response;
        return null;
    }
}

// Check if there's a prompt to generate the image
if (isset($_POST['prompt'])) {
    $prompt = $_POST['prompt'];
    $image_url = generateImage($prompt);

    if ($image_url) {
        echo '<img src="' . $image_url . '" alt="Generated Image" />';
    }
} else {
    echo 'Please provide a prompt.';
}
?>
