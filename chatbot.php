<?php
// Sample predefined responses
$responses = [
    'hello' => 'Hello! How can I assist you today?',
    'hi' => 'Hi there! How can I help you today?',
    'how are you' => 'I am just a bot, but I\'m functioning well!',
    'bye' => 'Goodbye! Have a wonderful day!',
    'what is your name' => 'I am your friendly voting assistant!',
    'help' => 'Sure! I can assist you with your voting queries.',
    'thank you' => 'You\'re welcome! If you have more questions, feel free to ask.',
    'what can you do' => 'I can help you with voting information, answer questions, and provide assistance.',
    'how do I start the voting process?' => 'To initiate the voting process, please log in to the voting portal with your student ID and password.',
    'voting steps' => "1. Ensure that you have a stable internet connection to avoid disruptions during the voting process.<br><br>" .
                     "2. On the voting page, you will see a list of positions and the candidates running for each position.<br><br>" .
                     "3. Click the checkbox next to the name of your preferred candidate for each position.<br><br>" .
                     "4. Once you have made your selections, click the 'Submit' button to cast your vote.<br><br>" .
                     "5. Before submitting your vote, you will have the opportunity to review your selections on a summary page. Make sure to double-check your choices before clicking the 'Confirm' button to finalize your vote.<br><br>" .
                     "After submitting your vote, you will receive a confirmation message on the screen indicating that your vote has been successfully recorded. You may also receive a confirmation email."
];

// Function to get the bot response
function getResponse($input) {
    global $responses;

    // Convert input to lowercase and trim spaces
    $input = strtolower(trim($input));

    // Log the input for debugging
    error_log("User input: '" . $input . "'");

    // Check if the input matches any predefined responses
    return isset($responses[$input]) ? $responses[$input] : "Sorry, I don't understand that.";
}

// Handle AJAX request
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $response = getResponse($message);
    echo $response;
    exit; // Stop further execution for AJAX requests
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Bot Interface</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .chat-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .message-container {
            max-height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f1f1f1;
        }
        .message {
            margin: 10px 0;
        }
        .message.user {
            text-align: right;
        }
        .message.user span {
            background-color: #007bff;
            color: white;
            padding: 8px;
            border-radius: 5px;
        }
        .message.bot span {
            background-color: #28a745;
            color: white;
            padding: 8px;
            border-radius: 5px;
        }
        .chatbot-icon {
            position: fixed;
            bottom: 20px;
            left: 0; /* Start from the left */
            width: 150px; /* Adjust size as needed */
            cursor: pointer;
            animation: moveRight 30s linear infinite; /* Animation */
            background: none; /* Make background transparent */
            border: none; /* Remove any border */
        }

        @keyframes moveRight {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(calc(100vw - 70px)); /* Move to the right end */
            }
            100% {
                transform: translateX(0); /* Move back to the starting point */
            }
        }
    </style>
</head>
<body>

<div class="chat-container">
    <h2 class="text-center">Voting Assistant</h2>
    <div class="message-container" id="responseContainer"></div>
    <div class="input-group">
        <input type="text" id="messageInput" class="form-control" placeholder="Type your message here...">
        <div class="input-group-append">
            <button id="sendButton" class="btn btn-primary">Send</button>
        </div>
    </div>
    <!-- Back Button -->
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-light">Back to Student Login</a>
    </div>
</div>

<!-- Chatbot Icon -->
<img src="https://as1.ftcdn.net/v2/jpg/05/88/95/30/1000_F_588953042_01Hrsog5OuZobKdMXf9GVpB6e6XiIhBa.webp" alt="Chatbot" class="chatbot-icon" onclick="scrollToChat()">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#sendButton').click(function() {
        var userMessage = $('#messageInput').val().trim(); // Trim the input
        if (userMessage === "") return; // Avoid sending empty messages
        
        // Append user message
        $('#responseContainer').append('<div class="message user"><span>' + userMessage + '</span></div>');
        $('#messageInput').val(''); // Clear input

        // AJAX request
        $.ajax({
            type: 'POST',
            url: '', // Current file
            data: { message: userMessage },
            success: function(response) {
                $('#responseContainer').append('<div class="message bot"><span>' + response + '</span></div>');
                $('#responseContainer').scrollTop($('#responseContainer')[0].scrollHeight); // Scroll to bottom
            },
            error: function() {
                $('#responseContainer').append('<div class="message bot"><span>Sorry, there was an error.</span></div>');
            }
        });
    });

    // Allow pressing Enter to send a message
    $('#messageInput').keypress(function(event) {
        if (event.which === 13) {
            $('#sendButton').click();
        }
    });
});

// Scroll to chat container when chatbot icon is clicked
function scrollToChat() {
    $('html, body').animate({
        scrollTop: $(".chat-container").offset().top
    }, 500);
}
</script>

</body>
</html>