<?php
// session_start();
// if(!isset($_SESSION['AdminLoginId'])) {
//     header("location:admin.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="icon" href="./img/logo.PNG" type="image/gif" >
    <title>Zlatni pojas - Admin</title>
    <style>
        #admin {
            color: #ec4646;
        }
        .odobravanje {
            background: #f0f0f0;
            min-height: 90px;
            margin: 20px 0;
        }
        h1 {
            margin-top: 10px;
            color: #ec4646;
        }
        h2 {
            color: #ec4646;
            padding-left: 20px;
        }
        hr {
            background: white;
        }
        #novaVest, #novaSlika {
            width: 100%;
            height: 70px;
            font-size: 27px;
            background: #104e8b;
            margin-top: 20px;
        }
        #novaVest:hover, #novaSlika:hover {
            background: #ec4646;
        } 
        #vest {
            display: none;
        }
    </style>
</head>
<?php
include('conn.php');
?>
<!-- <script type="text/javascript" src="./js/main.js"></script> -->
<body>
    <!--HEADER-->
    <script src="./js/display.js"></script>
    <div class="header">
        <div class="container">
            <div class="navbar2">
                <div class="row1">
                    <ul>
                        <li><i class="far fa-clock" id="clock"></i>Pon-Pet / 09-21h</li>
                        <li><a href="mailto:zlatnipojascacka@gmail.com" class="email"><i class="far fa-envelope" id="email"></i>zlatnipojascacka@gmail.com</a></li>
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
                <p><a href="index.html"><img src="./img/logo.PNG" alt="Logo" width="80px" height="80px" id="logo"></a></p>
                <ul>
                    <li style="margin-top: 10px;"><a href="adminPanel.php" id="turniri"><i class="fas fa-pencil-alt" style="color: #ec4646"></i> Turniri</a></li>
                    <li style="margin-top: 10px;"><a href="admin.php" id="admin"><i class="fas fa-user-cog" style="color: #ec4646"></i> Admin</a></li>
                    <form method="post">
                        <button name="logout" style="width:120px; background: #104e8b; text-transform: uppercase;font-size: 15px;">Odjavi se</button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_POST['logout'])) {
        session_destroy();
        header("location:prijava.php");
    }
    ?>
    <div class="container">
        <h1>Zahtevi za registraciju</h1>
        <div class="odobravanje">
            <h2>Odobri nove korisnike:</h2>
            <!-- ?php include 'send.php';? -->
            
<!-- ODOBRAVANJE/NEODOBRAVANJE NOVOG KORISNIKA I SLANJE EMAIL-A -->
<?php
    include_once("conn.php");
    $sql="SELECT * FROM pomocna_tabela";
    $results=mysqli_query($conn, $sql);
    if(mysqli_num_rows($results)>0) { //ovde je GRESKA
        while($rows=mysqli_fetch_assoc($results)) {
?>
<table style="width:1160px;">
    <tr style="background: white; padding:0;">
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['ime']?></td>
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['prezime']?></td>
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['korisnicko_ime']?></td>
        <td style="padding:10px;height:40px;width:350px;text-align:center;"><?php echo $rows['email']?></td>
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['uloga']?></td>
        <td style="color: white; text-transform: uppercase;background: #9ede73;text-align:center;cursor: pointer;">
        <form action="admin.php" method="post">
            <input style="border: 0; padding: 20px; min-width: 140px; color: white; text-transform: uppercase;background: #9ede73;text-align:center; cursor: pointer;" type="submit" name="odobri" placeholder="ODOBRI" value="ODOBRI">
        </form>
       </td>
        <td>
        <form action="admin.php" method="post">
            <input style="border: 0; padding: 20px; min-width: 140px; color: white; text-transform: uppercase;background: #ff7171;text-align:center; cursor: pointer;" type="submit" name="odbij" placeholder="ODBIJ" value="ODBIJ">
        </form>
        </td>
    </tr>
</table>
    <?php
            }
        }
    ?>

<?php
//prvo treba da pokupim podatke iz tabele URADJENO
//zatim te vrednosti dodelim promenljivama URADJENO
///////////// ODOBRI ////////////////////
//da promenim korisnicko ime URADJENO
//da vrednosti iz pomocne_tabele prebacim u glavnu tabelu shodno tome za kakvu ulogu se prijavio korisnik URADJENO
//da posaljem novo korisnicko ime na email adresu korisnika
////////////  ODBIJ //////////////////////
//podaci iz pomocne_tabele brisu
//korisniku se salje poruka ne gmail da nema srece u zivotu haha
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    include_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer(true);
    $alert = '';
    
if(isset($_POST['odobri'])) {
    include("conn.php");
    $sql = "SELECT * FROM pomocna_tabela";
    $results=mysqli_query($conn, $sql);
    if(mysqli_num_rows($results)>0) { //ovde je GRESKA
        while($rows = mysqli_fetch_assoc($results)) {
            $ime = $rows['ime'];
            $prezime = $rows['prezime'];
            $email = $rows['email'];
            $lozinka = $rows['lozinka'];
            $uloga = $rows['uloga'];
        }
    }
    $korisnicko_ime = strtolower($ime.'.'.$prezime.rand(1,99));
    echo $korisnicko_ime;
    if($uloga == 'Admin') {
        //insert into admin table
        $sql="INSERT INTO `admin_table`(`ime`,`prezime`,`korisnicko_ime`,`email`,`lozinka`,`uloga`) 
        VALUES ('$ime','$prezime','$korisnicko_ime','$email','$lozinka','$uloga')";
        $query=$conn->query($sql);
        if($query) {
            echo " RADI";
        } else {
            echo " NE RADI";
        }
    }
    //posto smo uneli podatke u bazu, moramo da obavestimo korisnika o uspesnoj registraciji i novom koriscnikom imenu
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'belkisa.dazdarevic1@gmail.com';
        $mail->Password = 'kvazilend5';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('belkisa.dazdarevic1@gmail.com');
        $mail->addAddress($email); //kome saljemo poruku na email

        $mail->isHTML(true);
        $mail->Subject='Registracija - ZLATNI POJAS';
        $mail->Body =
        '<p style="font-size: 18px;">Uspešno ste se registrovali na aplikaciji Zlatni pojas.<br>
        Prilikom prijave na sistem, koristite novo korisničko ime koje Vam šaljemo u prilogu.</p><br>
        <h2 style="color: #e63946">Novo korisničko ime: '.$korisnicko_ime.'</h2><br>
        <p style="color: gray;">
            Zlatni pojas<br>
            Administracija<br>
            <span style="font-size: 15px; color: grey;">E-mail: zlatnipojascacka@gmail.com<br>
            Web stranica: </span><br>
        </p>';

        $mail->send();
        $alert = '<div>Poruka je uspešno poslata!</div>';
    } 
    catch (Exception $e) {
        $alert = '<div>'.$e->getMessage().'</div>';
    }
} 
else {
    // echo "NE RADI";
}
// ODBIJEN ZAHTEV
if(isset($_POST['odbij'])) {
    include("conn.php");
    $sql = "SELECT * FROM pomocna_tabela";
    $results=mysqli_query($conn, $sql);
    if(mysqli_num_rows($results)>0) { //ovde je GRESKA
        while($rows = mysqli_fetch_assoc($results)) {
            $ime = $rows['ime'];
            $prezime = $rows['prezime'];
            $email = $rows['email'];
            $lozinka = $rows['lozinka'];
            $uloga = $rows['uloga'];
        }
    }
    $korisnicko_ime = strtolower($ime.'.'.$prezime.rand(1,99));
    echo $korisnicko_ime;

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'belkisa.dazdarevic1@gmail.com';
        $mail->Password = 'kvazilend5';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('belkisa.dazdarevic1@gmail.com');
        $mail->addAddress($email); //kome saljemo poruku na email

        $mail->isHTML(true);
        $mail->Subject='Odbijen zahtev za registraciju - ZLATNI POJAS';
        $mail->Body =
        '<p style="font-size: 18px;">Postovani,<br>
            Vas zahtev za registraciju je odbijen.
        </p><br>
        <p style="color: gray;">
            Zlatni pojas<br>
            Administracija<br>
            <span style="font-size: 15px; color: grey;">E-mail: zlatnipojascacka@gmail.com<br>
            Web stranica: </span><br>
        </p>';

        $mail->send();
        $alert = '<div>Poruka je uspešno poslata!</div>';
    } 
    catch (Exception $e) {
        $alert = '<div>'.$e->getMessage().'</div>';
    }
} 
else {
    // echo "NE RADI";
}
?>
        </div>
        <form method="post" action="posts.php" class="vest">
            <button type="submit" name="novaVest" id="novaVest">Dodaj novu vest<br>+</button>
        </form>
        <form method="post" action="posts.php">
            <button type="submit" name="novaSlika" id="novaSlika">Dodaj novu fotografiju u galeriju<br>+</button>
        </form>
    </div>
</body>
<?php
    if(isset($_POST['novaVest'])  || isset($_POST['novaSlika'])) {
        header("location:posts.php");
    }
    if(isset($_POST['logout'])) {
        session_destroy();
        header("location:prijava.php");
    }
    include_once("footer.php");
?>
</html>