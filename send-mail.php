<?php

// Allow only POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request");
}

// Clean inputs
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$website = trim($_POST['website'] ?? '');
$message = trim($_POST['message'] ?? '');
$website = $website ?: 'NA';

// Basic validation
if (!$name || !$email || !$message) {
    exit("Please fill all required fields.");
}

$to = "pawars.nilesh@gmail.com";
$subject = "New Contact Form Enquiry from $name";

// Plain text email (best delivery on BigRock)
$body = "You received a new message from ideaamity.com contact form\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Website: $website\n";
$body .= "Message:\n$message";

// BigRock-safe headers
$headers  = "From: IdeaAmity <no-reply@ideaamity.com>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send
if (mail($to, $subject, $body, $headers)) {
    echo "Thank you.\n Your inquiry has been successfully submitted.";
} else {
    echo "Server mail blocked. Contact hosting.";
}
