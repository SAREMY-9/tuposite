<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require __DIR__ . '/../../vendor/autoload.php';



// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

if (!function_exists('sendEmail')) {
    function sendEmail($mailConfig) {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 2; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = getenv('EMAIL_HOST'); // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = getenv('EMAIL_USERNAME'); // SMTP username
            $mail->Password = getenv('EMAIL_PASSWORD'); // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = getenv('EMAIL_PORT'); // TCP port to connect to

            // Recipients
            $fromAddress = getenv('EMAIL_FROM_ADDRESS');  
            $fromName = getenv('MAIL_FROM_NAME');
            $mail->setFrom($fromAddress, $fromName);
            $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $mailConfig['mail_subject'];
            $mail->Body = $mailConfig['mail_body'];

            // Send email
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
}

// Test email configuration
$mailConfig = [
    'mail_recipient_email' => 'recipient@example.com',
    'mail_recipient_name' => 'Recipient Name',
    'mail_subject' => 'Test Email',
    'mail_body' => 'This is a test email body.'
];

sendEmail($mailConfig);

?>