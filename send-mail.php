<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set recipient email address
    $to = "kapimestore@gmail.com";

    // Set email subject
    $email_subject = "Contact Form Submission: $subject";

    // Build the email content
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Set headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\n";

    // Attempt to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo json_encode(array('status' => 'success', 'message' => 'Email sent successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to send email. Please try again later.'));
    }
} else {
    // Handle invalid method
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}