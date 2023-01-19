<?php
include_once 'headerr.php';
$conn=mysqli_connect("localhost","root","","migapp");

if(mysqli_connect_error())
{
    echo "Cannot connect";
} else {
    // echo "Connected";
}

    if(isset($_FILES['profilna']))
    {
        $erorr=arraY();
        $file_name=$_FILES['profilna']['name'];
        $file_size=$_FILES['profilna']['size'];
        $file_tmp=$_FILES['profilna']['tmp_name'];
        $file_type=$_FILES['profilna']['type'];

        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        //slika.JPG-->slika.jpg
        $extensions=array("jpeg","jpg","png","JPG","PNG","JPEG");
        //ako ima gresaka
        if(in_array($file_ext, $extensions)==false)
        {
            $erorr[]="Molimo Vas izaberite fotografiju u jpg, jpeg ili png formatu!";
        }
        //ako nema gresaka
        if(empty($erorr)==true)
        {
            move_uploaded_file($file_tmp,"profilne/" . $file_name);
            $path="profilne/". $file_name;
            $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if($_POST['uloga']=='Admin')
            {
              $sql=
              "INSERT INTO admin_table (ime,prezime,mesto_rodjenja, jmbg, email,
              korisnicko_ime, lozinka, profilna, pol, uloga)
              VALUES ('$_POST[UserName]','$_POST[UserSurname]', '$_POST[mesto]', '$_POST[jmbg]','$_POST[UserEmail]','$_POST[User]',
                '$_POST[password]','$path','$_POST[pol]','$_POST[uloga]')";
              $query=$conn->query($sql);
              if($query)
              {
                  echo "RADI";
              } else
              {
                  echo mysqli_error($conn);
              }
            }

            if($_POST['uloga']=='Migrant')
            {
              $sql=
              "INSERT INTO migrant_table (ime,prezime,mesto_rodjenja, jmbg, email,
              korisnicko_ime, lozinka, profilna, pol, uloga)
              VALUES ('$_POST[UserName]','$_POST[UserSurname]', '$_POST[mesto]', '$_POST[jmbg]','$_POST[UserEmail]','$_POST[User]',
                '$_POST[password]','$path','$_POST[pol]','$_POST[uloga]')";
              $query=$conn->query($sql);
              if($query)
              {
                  echo "RADI";
              } else
              {
                  echo mysqli_error($conn);
              }
            }

        } else
        {
            print_r($erorr);
        }
      }
?>

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
    </style>
</head>
<body class="prijava">
    <main>
        <a href="index.php"><img src="./img/logo.PNG" alt="Logo" width="150px" height="150px" id="logo"></a>
        <h2 style="margin-left: 120px;">MigApp</h2>
        <p>Unesite podatke za registraciju.</p>
        <form role="form"  action="registracija.php" method="post" enctype="multipart/form-data">
            <div class="contact-form-text">
                <input type="text" name="UserName" id="" placeholder="Ime" required>
            </div>
            <div class="contact-form-text">
                <input type="text" name="UserSurname" id="" placeholder="Prezime" required>
            </div>
            <div class="contact-form-text">
                <input type="text" name="mesto" id="" placeholder="Mesto rođenja">
            </div>
            <div class="contact-form-text">
                <input type="number" name="jmbg" id="" placeholder="JMBG">
            </div>
            <div class="contact-form-text">
                <input type="email" name="UserEmail" id="" placeholder="Email" required>
            </div>
            <div class="contact-form-text">
                <input type="text" name="User" id="" placeholder="Korisničko ime" required>
            </div>
            <div class="contact-form-text">
                <input type="password" name="password" id="Lozinka" placeholder="Lozinka" required>
            </div>
            <label for="profilna" class="profilna" style="margin-left:10px;">Profilna fotografija:</label>
            <input type="file" name="profilna" id="profilna" required>
            <div class="contact-form-text">
                <label for="pol" style="color: white;">Pol:</label>
                <select id="pol" name="pol">
                    <option value="M" width="100px">Muško</option>
                    <option value="Ž">Žensko</option>
                </select>
            </div>
            <div class="contact-form-text">
                <label for="uloga" style="color: white;">Registrujem se kao:</label>
                <select id="uloga" name="uloga">
                    <option value="Migrant" width="100px">Migrant</option>
                    <option value="Admin">Administrator</option>
                </select>
            </div>
            <div class="contact-form-text">
                <button type="submit" name="submit">REGISTRUJ SE</button>
            </div>
        </form>
    </main>

</body>
</html>
