<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host ='mail.dinuda.com' ; // GMail SMTP server address
    $mail->SMTPAuth = true;
    $mail->Username='twilightterracehotel@dinuda.com';//GMAIL USERNAME
    $mail->Password='Chathu@0604';//<PASSWORD> PASSWORD
    $mail->SMTPSecure = 'ssl';
    // $mail->Port=587;//PORT NUMBER FOR SSL
    $mail->Port=465;//PORT NUMBER FOR SSL

    $mail->setFrom('twilightterracehotel@dinuda.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body =$_POST["message"];

    $mail->send();

    echo
    "
    <script>
    alert('Sent Successfully');
    document.location.href = 'index.php';
    </script>
    ";
}
?>