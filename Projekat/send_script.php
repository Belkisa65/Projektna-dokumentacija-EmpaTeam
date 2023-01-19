<?php 
if (isset($_POST['send_message_btn'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['msg'];
  
  $message = "<html>
  <head>
  	<title>Nova poruka</title>
  </head>
  <body>
  	<h1 style='color: #104e8b'>Zlatni pojas Čačka</h1>
  	<p>".$msg."</p>
  </body>
  </html>";
  $message = wordwrap($message, 70); //svaka linija ne sme da sadrzi vise od 70 karaktera
  if (mail('belkisa.dazdarevic1@gmail.com', 'Zlatni pojas Čačka', $message)) {
   echo "Email sent :D";
  }else{
   echo "Failed to send email. Please try again later :D";
  }
?>