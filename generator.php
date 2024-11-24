<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chatbot Image Generator</title>
</head>
<body>
    <h1>Chatbot Image Generator</h1>

    <!-- Chatbot interface -->
    <div id="chatbox">
        <div id="messages"></div>
    </div>

    <input type="text" id="user_input" placeholder="Type your prompt here">
    <button onclick="sendMessage()">Generate Image</button>

    <script>
        function sendMessage() {
            let prompt = document.getElementById('user_input').value;

            // Display user message
            let messageBox = document.createElement('div');
            messageBox.textContent = "You: " + prompt;
            document.getElementById('messages').appendChild(messageBox);

            // Send prompt to the backend (PHP script)
            let formData = new FormData();
            formData.append('prompt', prompt);

            fetch('generatorLogic.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Display generated image
                let imgBox = document.createElement('div');
                imgBox.innerHTML = data;
                document.getElementById('messages').appendChild(imgBox);
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
