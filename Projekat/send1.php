<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail=new PHPMailer(true);
$alert='';

if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    try {
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='belkisa.dazdarevic1@gmail.com';
        $mail->Password='kvazilend5';
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port='587';

        $mail->setFrom('belkisa.dazdarevic1@gmail.com');
        $mail->addAddress('belkisa.dazdarevic1@gmail.com');

        $mail->isHTML(true);
        $mail->Subject='Email od posetioca sajta ZLATNI POJAS ČAČKA';
        $mail->Body=
        '<h1>Podaci o pošiljaocu poruke:</h1><br>
        <h3>Ime i prezime: $name</h3>
        <h3>Email: $email</h3><br><br>
        <p>Poruka: $message</p>';

        $mail->send();
        $alert='<div>Poruka je uspesno poslata!</div>';
    } catch (Exception $e) {
        $alert='<div>'.$e->getMessage().'</div>';
    }

}
?>