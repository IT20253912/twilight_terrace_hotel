<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host ='mail.dinuda.com'; // GMail SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username='twilightterracehotel@dinuda.com';//GMAIL USERNAME
    $mail->Password='Chathu@0604';//GMAIL PASSWORD
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; // Port number for SSL

    $mail->setFrom('twilightterracehotel@dinuda.com');
    
    $emailAddresses = explode(',', $_POST["email"]); // Split email addresses by comma

    foreach ($emailAddresses as $email) {
        $mail->clearAddresses(); // Clear any previously added recipients
        $mail->addAddress(trim($email)); // Add the recipient email address

        $mail->isHTML(true);

        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        try {
            $mail->send();
            echo "<p>Email sent to: " . trim($email) . "</p>";
        } catch (Exception $e) {
            echo "<p>Email could not be sent to: " . trim($email) . "</p>";
        }
    }

    echo
    "
    <script>
    alert('Email(s) sent successfully');
    document.location.href = 'index.php';
    </script>
    ";
}
?>
