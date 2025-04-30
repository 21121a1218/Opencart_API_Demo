<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '7c2d39bc8cc457';     // Your username from Mailtrap
    $mail->Password   = '9191c7b94ba6ac'; // Replace with your full Mailtrap password (****a6ac)
    $mail->Port       = 2525;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    // Recipients
    $mail->setFrom('you@example.com', 'Your Name');
    $mail->addAddress('test@example.com', 'Test Receiver');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Mail from PHPMailer and Mailtrap';
    $mail->Body    = 'This is a test email sent from <b>PHPMailer</b> using Mailtrap.';

    $mail->send();
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
