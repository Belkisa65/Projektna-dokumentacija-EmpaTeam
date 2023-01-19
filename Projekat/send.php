<?php
        include_once("conn.php");
        $sql="SELECT * FROM pomocna_tabela";
        $results=mysqli_query($conn, $sql);
        if(mysqli_num_rows($results)>0) { //ovde je GRESKA
            while($rows=mysqli_fetch_assoc($results)) {
    ?>
<table style="width:1160px;">
    <tr style="background: white;padding:0;">
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['ime']?></td>
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['prezime']?></td>
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['korisnicko_ime']?></td>
        <td style="padding:10px;height:40px;width:350px;text-align:center;"><?php echo $rows['email']?></td>
        <td style="padding:10px;height:40px;width:130px;text-align:center;"><?php echo $rows['uloga']?></td>
        <td style="padding:10px;color: white; text-transform: uppercase;background: #9ede73;text-align:center;cursor: pointer;">
        <form action="admin.php" method="post">
            <input type="submit" name="odobri" placeholder="ODOBRI">
        </form>
       </td>
        <td style="padding:20px;color: white; text-transform: uppercase;background: #ff7171;text-align:center; cursor: pointer;">
        <form action="admin.php" method="post">
            <input type="submit" name="odbij" placeholder="ODBIJ">
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
    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail=new PHPMailer(true);
    $alert='';
    
if(isset($_POST['odobri'])) {
    include("conn.php");
    $sql="SELECT * FROM pomocna_tabela";
    $results=mysqli_query($conn, $sql);
    if(mysqli_num_rows($results)>0) { //ovde je GRESKA
        while($rows=mysqli_fetch_assoc($results)) {
            $ime=$rows['ime'];
            $prezime=$rows['prezime'];
            $email=$rows['email'];
            $lozinka=$rows['lozinka'];
            $uloga=$rows['uloga'];
        }
    }
    $korisnicko_ime=strtolower($ime.'.'.$prezime.rand(1,99));
    echo $korisnicko_ime;
    if($uloga=='Admin') {
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
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='belkisa.dazdarevic1@gmail.com';
        $mail->Password='kvazilend5';
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port='587';

        $mail->setFrom('belkisa.dazdarevic1@gmail.com');
        $mail->addAddress($email); //kome saljemo poruku na email

        $mail->isHTML(true);
        $mail->Subject='USPESNA REGISTRACIJA - ZLATNI POJAS';
        $mail->Body=
        '<h1>Podaci o pošiljaocu poruke:</h1><br>
        <p>Cestitamo! Uspešno ste se registrovali na aplikaciji Zlatni pojas.<br>
        Prilikom prijave na sistem, molimo Vas da koristite novo korisničko ime koje Vam šaljemo u prilogu.</p><br>
        <h3>Novo korisničko ime: '.$korisnicko_ime.'</h3>';

        $mail->send();
        $alert='<div>Poruka je uspešno poslata!</div>';
    } catch (Exception $e) {
        $alert='<div>'.$e->getMessage().'</div>';
    }

} else {
    echo "NE RADI";
}
?>