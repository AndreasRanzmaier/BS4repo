<!DOCTYPE html>
<html>

<head>
    <title>ChatGPT Website</title>
</head>

<body>
    <h1>ChatGPT Website</h1>
    <form method="POST" action="">
        <label for="user-input">Enter your message:</label><br>
        <input type="text" id="user-input" name="user_input"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if a user input exists
    if (isset($_POST['user_input'])) {
        $userInput = $_POST['user_input'];

        // Call ChatGPT API to generate response
        $apiUrl = 'https://api.openai.com/v1/engines/davinci/completions';
        $apiKey = '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';

        $data = array(
            'prompt' => $userInput,
            'max_tokens' => 50 // Adjust the response length as needed
        );

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        // Check for API request errors
        if ($response === false) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $responseData = json_decode($response, true);

            // Check for API response errors
            if (isset($responseData['error'])) {
                echo 'Error: ' . $responseData['error']['message'];
            } else {
                $output = $responseData['choices'][0]['text'];

                // Display the response
                echo '<h3>Response:</h3>';
                echo '<p>' . $output . '</p>';
            }
        }

        curl_close($ch);
    }
    ?>
</body>

</html>