<?php
// Sample predefined responses
$responses = [
    'hello' => 'Hello! How can I assist you today?',
    'how are you' => 'I am just a bot, but I\'m functioning well!',
    'bye' => 'Goodbye! Have a wonderful day!',
    'how do I start the voting process?' => 'To initiate the voting process, please log in to the voting portal with your student ID and password.',
    'voting steps' => "1. Ensure that you have a stable internet connection to avoid disruptions during the voting process.\n\n" .
                     "2. On the voting page, you will see a list of positions and the candidates running for each position.\n\n" .
                     "3. Click the checkbox next to the name of your preferred candidate for each position.\n\n" .
                     "4. Once you have made your selections, click the 'Submit' button to cast your vote.\n\n" .
                     "5. Before submitting your vote, you will have the opportunity to review your selections on a summary page. Make sure to double-check your choices before clicking the 'Confirm' button to finalize your vote.\n\n" .
                     "After submitting your vote, you will receive a confirmation message on the screen indicating that your vote has been successfully recorded. You may also receive a confirmation email."
];

// Function to get the bot response
function getResponse($input) {
    global $responses;

    // Convert input to lowercase and trim spaces
    $input = strtolower(trim($input));

    // Check if the input matches any predefined responses
    return isset($responses[$input]) ? $responses[$input] : "Sorry, I don't understand that.";
}

// Handle AJAX request
if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $response = getResponse($message);
    echo $response;
}
?>