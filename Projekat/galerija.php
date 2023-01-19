<?php
session_start();
if(!isset($_SESSION['AdminLoginId'])) {
    header("location:adminPanel.php");
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="icon" href="./img/logo.PNG" type="image/gif" >
    <title>Zlatni pojas - Radna ploča</title>
    <style media="screen">
      .update {
        background-color: #fff;
        box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
      }
      .update input {
        padding-left: 10px;
      }
      .update h2 {
        color: #104e8b;
        padding: 20px 0 0 20px;
      }
      /* UPESNO DODAVANJE NOVE VESTI */
      div.uspesno-update1 {
          width: 560px;
          padding: 20px 0px 20px 20px;
          margin: 10px 0;
          font-size: 16px;
          background-color: #1597BB;
          position: relative;
          border-left: 6px solid black;
          /* display: none; */
      }
      div.uspesno-update1 p span {
          font-weight: bold !important;
      }
      div.uspesno-update1 i {
          padding: 0 10px 0 0;
          color: black;
          font-size: 20px;
      }
      div.uspesno-update1 i.fa-times {
          font-size: 25px;
          position: absolute;
          top: 7px;
          right: 0;
      }
      div.uspesno-update1 i.fa-times:hover {
          cursor: pointer;
          color: #564a4a;
      }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-naslov">
            <a href="index.php"><img src="./img/logo.PNG" class="logo" alt="Logo" width="40px" height="40px" id="logo"></a>
            <h2>Zlatni pojas</h2>
        </div>
        <div class="sidebar-brands">
            <?php
              include("conn.php");
              $query="SELECT ime, prezime, korisnicko_ime, profilna, uloga FROM `admin_table` WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]'";
              $result=mysqli_query($conn, $query);

              while($rows=mysqli_fetch_assoc($result))
              {
            ?>
            <img src="<?php echo $rows['profilna']?>" class="logo" alt="Logo" width="90px" height="90px" id="logo" style="margin:0 0 5px 0;">
            <h4 style="margin-bottom: 5px;text-transform: uppercase;"><?php echo $rows['korisnicko_ime']?></h4>
            <p style="margin-bottom: 50px;"><?php echo $rows['uloga']?></p>
        </div>
        <div class="sidebar-menu">
            <li>
                <a href="adminPanel.php"><i class="fas fa-home"></i><span>Radna ploča</span></a>
            </li>
            <li class="toggle1" onclick="change()">
                <a href="#"><i class="fas fa-users"></i><span>Korisnici</span><i class="fas fa-angle-down" style="padding-left: 83.5px;"></i></a>
            </li>
            <ul class="dropDown">
                <li id="nested1" class="activeNested"><a href="admini.php">Administratori</a></li>
                <li id="nested2" class="activeNested"><a href="koordinatori.php">Koordinatori</a></li>
                <li id="nested3" class="activeNested" onclick="change3()"><a href="#">Takmičari<i class="fas fa-angle-down" style="padding-left: 52px;"></i></a></li>
                <ul class="dropDown">
                    <li id="nested111" class="activeNested activeNestedStyle"><a href="takmicari.php">Pojedinačno</a></li>
                    <li id="nested222" class="activeNested activeNestedStyle"><a href="#">Timovi</a></li>
                </ul>
            </ul>
            <li>
                <a href="zahtevi.php"><i class="far fa-user-circle"></i>Zahtevi</span>
                  <?php
                      require 'conn.php';

                      $query = "SELECT id from pom_tabela order by id";
                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);
                      if($row>0)
                      {
                        echo '<span style="display: inline-block; text-align: center; background: #ec4646; color: #fff; height: 20px; width: 20px; border-radius: 50%;">'.$row.'</span>';
                      }
                  ?>
                </a>
            </li>
            <li>
                <a href="novosti.php"><i class="far fa-newspaper"></i><span>Novosti</span></a>
            </li>
            <li class="toggle2" onclick="change2()">
                <a href="#"><i class="far fa-list-alt"></i><span>Objave</span><i class="fas fa-angle-down" style="padding-left: 101px;"></i></a>
            </li>
            <ul class="dropDown">
                <li id="nested11" class="activeNested"><a href="vesti2.php">Vesti</a></li>
                <li class="active" id="nested22" class="activeNested"><a href="galerija.php">Galerija</a></li>
                <li id="nested33" class="activeNested"><a href="#">Turniri</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <i class="fas fa-bars"></i>
                Galerija
            </h2>

            <div class="user-wrapper">
                <ul>
                    <li id="profile">
                        <a href="#"><i class="fas fa-user-circle"></i><?php echo $rows['ime']." ".$rows['prezime']?><i class="fas fa-angle-down"></i></a>
                        <div id="drop-down">
                            <a href="mojprofil.php" class="clinks"><i class="fas fa-user-circle"></i>Profil</a>
                            <form action="code.php" method="post">
                                <button type="submit" name="logout" class="clinks btn-logout" style="padding-right: 115px; background-color: #f1f5f9;"><i class="fas fa-power-off"></i>Odjavi se</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <?php
          }
        ?>
        <main>
          <!-- INSERT NEW POST -->
          <?php
              if(isset($_SESSION['status_insert']))
              {
          ?>
              <div class="uspesno-update1">
                  <i class="fas fa-times" class="close" onclick="this.parentElement.style.display='none';"></i>
                  <p><i class="fas fa-exclamation-circle"></i><span>Hej!</span> <?php echo $_SESSION['status_insert']; ?></p>
              </div>
          <?php
              unset($_SESSION['status_insert']);
              }
          ?>
          <div class="update">
            <form action="code.php" method="post" enctype="multipart/form-data" id="galerija">
                <h2 style="margin-bottom:20px; margin-left: 20px;">Dodajte novu fotografiju u galeriju</h2>
                <div class="contact-form-text">
                  <div class="contact-form-text">
                    <label for="opis" style="color: black;">Opis fotografije:</label>
                    <input type="text" name="opis" style="margin-top: 5px;" required>
                  </div>
                  <div class="contact-form-text">
                    <label for="foto" class="profilna" style="color: black;padding-left:0;">Fotografija:</label>
                    <input type="file" name="foto" id="profilna" required>
                  </div>
                </div>
                <div class="contact-form-text">
                  <?php
                    include("conn.php");
                    $query="SELECT id_admina FROM `admin_table` WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]'";
                    $result=mysqli_query($conn, $query);

                    while($rows=mysqli_fetch_assoc($result))
                    {
                  ?>
                  <input type="hidden" type="submit" name="id_admina" placeholder="Izbriši" value="<?= $rows['id_admina'];?>">
                  <?php
                    }
                  ?>
                  <button type="submit" name="addNewPhoto" style="background: #1597BB; width:100px; margin-left: 20px;">
                    Dodaj
                  </button>
                </div>
            </form>
          </div>
        </main>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
