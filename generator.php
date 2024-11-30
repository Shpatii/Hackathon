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
      background-color: #121212; /* Dark theme */
      color: #ffffff; /* White text */
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }

    /* Heading styling */
    h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
      color: #c934eb; /* Purple for emphasis */
    }

    h6 {
      font-size: 1rem;
      margin-bottom: 20px;
      color: #c9c9c9; /* Light gray for subtitle */
    }

    /* Chatbot container */
    #chatbot-container {
      background-color: #1e1e1e; /* Slightly lighter gray */
      border-radius: 15px;
      padding: 30px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
    }

    /* Input field */
    #controls {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    #user_input {
      flex: 1;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #c934eb; /* Purple border */
      border-radius: 5px;
      margin-right: 10px;
      color: #000; /* Black text inside input */
    }

    #user_input:focus {
      border-color: #a51ed5; /* Slightly darker purple on focus */
      outline: none;
      box-shadow: 0 0 5px rgba(201, 52, 235, 0.5); /* Purple glow */
    }

    /* Button styling */
    button {
      padding: 10px 20px;
      font-size: 1rem;
      background-color: #c934eb; /* Purple button */
      color: #ffffff;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background-color: #a51ed5; /* Darker purple on hover */
      transform: scale(1.05);
    }

    /* Generated image container */
    #generated-image {
      margin-top: 20px;
      background-color: #282828; /* Dark gray background */
      border-radius: 10px;
      padding: 20px;
      color: #ffffff;
      font-size: 1rem;
      text-align: center;
      min-height: 200px; /* Placeholder size */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Back link styling */
    .back {
      display: inline-block;
      margin-top: 20px;
      font-size: 1rem;
      text-decoration: none;
      color: #ffffff;
      background-color: #c934eb; /* Purple background */
      padding: 10px 20px;
      border-radius: 25px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .back:hover {
      background-color: #a51ed5;
      transform: scale(1.05);
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
