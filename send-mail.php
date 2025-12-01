<?php

// Get form fields safely
$name     = isset($_POST['name']) ? trim($_POST['name']) : 'NA';
$email    = isset($_POST['email']) ? trim($_POST['email']) : 'NA';
$website  = isset($_POST['website']) ? trim($_POST['website']) : 'NA';
$message  = isset($_POST['message']) ? trim($_POST['message']) : 'NA';

// If website field is empty show NA
$website = !empty($website) ? $website : 'NA';

// Receiver email
$to = "pawars.nilesh@gmail.com";   // <-- CHANGE THIS

// Email subject
$subject = "New Contact Form Submission";

// HTML email body
$body = "
<html>
<body>
<table border='1' cellspacing='0' cellpadding='10'
style='border-collapse: collapse; font-family: Arial; width: 100%; max-width: 600px;'>

<tr>
  <th align='left'>Name</th>
  <td>$name</td>
</tr>

<tr>
  <th align='left'>Email</th>
  <td>$email</td>
</tr>

<tr>
  <th align='left'>Website</th>
  <td>$website</td>
</tr>

<tr>
  <th align='left'>Message</th>
  <td>$message</td>
</tr>

</table>
</body>
</html>
";

// Email headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Contact Form <no-reply@yourdomain.com>\r\n";

// Send email
if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
