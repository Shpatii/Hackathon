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

function generateImage($prompt) {
    global $apiKey;  
    
    $url = 'https://api.openai.com/v1/images/generations';

    // cURL request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'prompt' => $prompt,
        'n' => 1,  
        'size' => '512x512',  
    ]));
    
   
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey  
    ]);

    
    $response = curl_exec($ch);
    
    if ($response === false) {
        echo 'Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch);
    }
    
    curl_close($ch);

   
    $response_data = json_decode($response, true);

   
    if (isset($response_data['data']) && is_array($response_data['data'])) {
        
        return $response_data['data'][0]['url'];
    } else {
     
        echo 'Error: Unable to generate image. Response: ' . $response;
        return null;
    }
}


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
