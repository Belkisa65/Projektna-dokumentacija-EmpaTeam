<?php
include_once 'conn.php';
if(isset($_FILES['submit']))
{
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
            // $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql=
            "INSERT INTO pom_tabela (ime,prezime,korisnicko_ime, datum_rodjenja, mesto_rodjenja, drzava_rodjenja,
            jmbg,email,lozinka,pol,disciplina,kilaza,trener,ime_kluba,grad,uloga,profilna)
            VALUES ('$_POST[UserName]','$_POST[UserSurname]','$_POST[User]', '$_POST[datum_rodjenja]', '$_POST[mesto]','$_POST[drzava]','$_POST[jmbg]',
              '$_POST[UserEmail]','$_POST[password]','$_POST[pol]','$_POST[disciplina]','$_POST[kilaza]','$_POST[trener]','$_POST[klub]','$_POST[grad]','$_POST[uloga]','$path')";
            $query=$conn->query($sql);
            if($query)
            {
                echo "RADI";
            } else
            {
                echo mysqli_error($conn);
            }
        } else
        {
            print_r($erorr);
        }
      }



      if(strlen($_POST['password']) < 8)
      {
           header("location:registracija.php?error=kratakPassword");
       }

       if($_POST['password_p'] !=  $_POST['password'])
       {
            header("location:registracija.php?error=razlicitiPass");
        }

        if(strlen($_POST['jmbg']) < 13)
        {
             header("location:registracija.php?error=neispravanJmbg");
         }

}
?>
