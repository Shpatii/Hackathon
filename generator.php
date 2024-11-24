<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chatbot Image Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 20px;
            font-size: 24px;
        }

        #chatbot-container {
            margin: 50px auto;
            max-width: 500px;
        }

        #generated-image {
            margin-top: 20px;
        }

        #controls {
            margin-top: 20px;
        }

        #user_input {
            padding: 10px;
            width: 80%;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top : 5%;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        .back{
            
        }
    </style>
</head>
<body>
    <h1>AI Image Generator</h1>
     <h6>Wait it may take a minute or two </h6>

    <div id="chatbot-container">
        <div id="controls">
            <input type="text" id="user_input" placeholder="Type your prompt here">
            <button onclick="generateImage()">Generate Image</button>
        </div>
        <div id="generated-image"></div>

        <br>

        <a href="index.php" class="back">Go back-></a>
    </div>

    <script>
        function generateImage() {
            let prompt = document.getElementById('user_input').value;

            if (prompt.trim() === '') {
                alert("Please enter a prompt.");
                return;
            }

            // Clear the previous image
            const imageContainer = document.getElementById('generated-image');
            imageContainer.innerHTML = "<p>Loading...</p>";

            // Send the prompt to the backend (PHP script)
            let formData = new FormData();
            formData.append('prompt', prompt);

            fetch('generatorLogic.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Display the new generated image
                imageContainer.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
                imageContainer.innerHTML = "<p>Something went wrong. Please try again.</p>";
            });
        }
    </script>
</body>
</html>
