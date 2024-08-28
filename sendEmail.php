<?php
// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Adjust the path to autoload.php as necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'testprintmysproject@gmail.com'; // SMTP username
        $mail->Password = 'ozmj vwmt bjhb ifnq';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPDebug = 2; // Enable verbose debug output

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('testprintmysproject@gmail.com', 'Mailer'); // Add a recipient

        // Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        $mail->send();
        echo '<p>Message has been sent</p>';
    } catch (Exception $e) {
        echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My PHP Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<body>
    <h1>Welcome to My PHP Page</h1>
    
 

    <!-- HTML form for sending an email -->
    <form id="contactForm" action="" method="post">
        <div>
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
