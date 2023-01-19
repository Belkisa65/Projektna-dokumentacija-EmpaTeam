<!DOCTYPE html>
<html lang="sr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="icon" href="./img/logo.PNG" type="image/gif" >
    <title>MigApp</title>
    <style media="screen">
    div.jumbotron {
        margin-left: 0px !important;
        margin-bottom: 40px;
        /* box-shadow: 1px 1px 1px 1px #7d7d7d; */
        height: 81.8vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)), url(./img/uvod.png);
        background-position: top;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        margin-top: 0 !important;
    }
    .jumbotron h1 {
      padding-top: 50px;
      /* padding-right: 250px; */
      color: white;
    }
    .jumbotron img {
      margin-left: 100px;
      margin-top: 190px;
    }
    </style>
</head>
<body>
    <!--HEADER-->
    <div class="header">
        <div class="container">
            <div class="navbar2">
                <div class="row1">
                    <ul>
                        <li><i class="far fa-clock" id="clock"></i>Pon-Pet / 09-21h</li>
                        <li><a href="mailto:zlatnipojascacka@gmail.com" class="email"><i class="far fa-envelope" id="email"></i>empateam@gmail.com</a></li>
                        <li><a href="#" class="links link1"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="links"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="links"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="container">
            <div class="row">
                <p>
                  <a href="index.php"><img src="./img/logo.PNG" alt="Logo" width="100px" height="100px" id="logo" style="border-radius: 50%;"></a>
                </p>
                <ul>
                    <li><a href="#" class="active">Početna</a></li>
                    <!-- <li><a href="posts.php">Vesti</a></li> -->
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--MAIN-->
    <div class="jumbotron">
        <div class="container">
            <!-- <h1>Zlatni pojas Čačka</h1> -->
            <img src="./img/naziv.jpg" alt="Diploma" height="150px" width="930px">
        </div>
    </div>
    <div class="main omeni">
        <div class="container">
            <!--DOBRODOSLICA-->
            <h1>EmpaTeam</h1>
            <div class="clearfix">
                <div class="col1 photo-diploma">
                    <img src="./img/zemlje.jpg" alt="Diploma" height="290px" width="540px" class="slika1">
                    <img src="./img/kugla.jpg" alt="Diploma" height="290px" width="540px" class="slika1">
                </div>
                <div class="col2 licni-podaci">
                    <!-- <img src="./img/piper.jpg" alt="Slavoljub Piper" height="185px" width="140px" class="piper">
                    <h3 class="heading-tertiary naslov">EmpaTeam<br></h3> -->
                    <p class="paragraph-omeni" id="dobrodoslica">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br>
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br> It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, <br>
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br>
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br> It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, <br>
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br>
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br> It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged.<br>
                        and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                    </p>

                    </div>
            </div>
         </div>
    </div>
        <!--KONTAKT-->
        <div class="kontakt">
            <h2 id="naslov-v">Kontaktirajte nas</h2>
            <div class="container clearfix">
                <div class="c-1">
                    <article class="contact-form">
                        <p id="paragraph-v">Ako imate bilo kakvih pitanja, jednostavno koristite sledeće podatke za kontakt.</p>
                        <ul>
                            <li id="adresa"><b>Adresa</li>
                            <li class="link"><i class="fas fa-map-marker"></i>Vuk Karadžić 28, Novi Pazar</li>
                            <li id="tel"><b>Telefon</li>
                            <li class="link"><i class="fas fa-phone-alt"></i>020-811-951</li>
                            <li><b>Email</li>
                            <li class="link"><a href="mailto:zlatnipojascacka@gmail.com"><i class="far fa-envelope"></i>empateam@gmail.com</a></li><hr>
                        </ul>
                    </article>
                </div>
                <div class="c-2">
                    <article>
                        <div>
                            <form method="post" action="">
                                <div class="contact-form-text">
                                  <label for="name">Ime i prezime <span>*</span></label>
                                  <input type="text" name="name" id="name" required>
                                </div>
                                <div class="contact-form-text">
                                  <label for="email">E-mail <span>*</span></label>
                                  <input type="email" name="email" id="email" required>
                                </div>
                                <div class="contact-form-text">
                                  <label for="message">Poruka <span>*</span></label>
                                  <textarea name="message" id="message" required></textarea>
                                </div>
                                <input type="submit" name="submit" class="btn btn-blue btn-animated" id="posalji" value="Pošalji" onclick="proveraForme()">
                            </form>
                        </div>
                    </article>
                </div>
                <div class="c-3">
                    <article>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11646.184178925718!2d20.51519654888899!3d43.13506168388462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smap!5e0!3m2!1ssr!2srs!4v1625526946350!5m2!1ssr!2srs"  width="367px" height="470px" style="border:0;" frameborder="0"  aria-hidden="false" tabindex="0"></iframe>
                    </article>
                </div>
            </div>
        </div>
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
        $alert='<div>Poruka je uspešno poslata!</div>';
    } catch (Exception $e) {
        $alert='<div>'.$e->getMessage().'</div>';
    }

}
?>
<?php include_once 'footer.php'; ?>
