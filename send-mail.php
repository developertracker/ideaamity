<?php
$name    = $_POST['name'];
$email   = $_POST['email'];
$website   = $_POST['website'];
$message = $_POST['message'];

$to      = "pawars.nilesh@gmail.com";
$subject = "New Contact Form Message";

$body = "
<html>
<body>
<table border='1' cellspacing='0' cellpadding='10' style='border-collapse: collapse; font-family: Arial;'>
  <tr>
    <th align='left'>Name</th>
    <td>$name</td>
  </tr>
  <tr>
    <th align='left'>Email</th>
    <td>$email</td>
  </tr>
  <tr>
    <th align='left'>Email</th>
    <td>" . (!empty($website) ? $website : 'NA') . "</td>
  </tr>
  <tr>
    <th align='left'>Message</th>
    <td>$message</td>
  </tr>
</table>
</body>
</html>
";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: <$email>\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
