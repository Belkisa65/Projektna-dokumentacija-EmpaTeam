
<?php
session_start();
if(!isset($_SESSION['CoordinatorLoginId'])) {
    header("location:coordinatorPanel.php");
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
        margin-bottom: 50px;
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
      .galerija {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
      }

      /* USPESNO IZBRISANO */
      div.uspesno-izbrisano {
          width: 560px;
          padding: 20px 0px 20px 20px;
          margin: 10px 0;
          font-size: 16px;
          background-color: #feceab;
          position: relative;
          border-left: 6px solid #ff847c;
          display: block;
      }
      div.uspesno-izbrisano p span {
          font-weight: bold;
      }
      div.uspesno-izbrisano i {
          padding: 0 10px 0 0;
          color: #ff847c;
          font-size: 20px;
      }
      div.uspesno-izbrisano i.fa-times {
          font-size: 25px;
          position: absolute;
          top: 7px;
          right: 0;
      }
      div.uspesno-izbrisano i.fa-times:hover {
          cursor: pointer;
          color: #564a4a;
      }
      .buttons {
        display: flex;
      }
      .row {
        display: flex;
        justify-content: space-between;
        /* outline: 1px dotted red; */
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: 13px;
        padding-bottom: 3px;
        border-bottom: 1px solid lightgray;
      }
      .row h2 {
        padding-left: 0;
        padding-bottom: 8px;
      }
      input {
        border:1px solid lightgray;
      }
      .row ul {
        margin-right: 0px;
      }
      .row ul li {
        padding: 18px;
      }
      .row ul li a {
        text-align: center;s
      }
      .row ul li:hover {
        border-bottom: 5px solid #104e8b;
        cursor: pointer;
      }
      .active_li {
        border-bottom: 5px solid #104e8b;
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
              $query="SELECT ime, prezime, korisnicko_ime, profilna, uloga, mesto_rodjenja, drzava_rodjenja, email FROM `coordinator_table` WHERE `korisnicko_ime`='$_SESSION[CoordinatorLoginId]'";
              $result=mysqli_query($conn, $query);

              while($rows=mysqli_fetch_assoc($result))
              {
            ?>
            <img src="<?php echo $rows['profilna']?>" class="logo" alt="Logo" width="90px" height="90px" id="logo" style="margin:0 0 5px 0;">
            <h4 style="margin-bottom: 5px;"><?php echo $rows['korisnicko_ime']?></h4>
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
                <a href="novosti.php"><i class="far fa-newspaper"></i><span>Novosti</span></a>
            </li>
            <li class="toggle2" onclick="change2()">
                <a href="#"><i class="far fa-list-alt"></i><span>Objave</span><i class="fas fa-angle-down" style="padding-left: 101px;"></i></a>
            </li>
            <ul class="dropDown">
                <li id="nested11" class="activeNested"><a href="vesti2.php">Vesti</a></li>
                <li id="nested22" class="activeNested"><a href="galerija.php">Galerija</a></li>
                <li id="nested33" class="activeNested"><a href="#">Turniri</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <i class="fas fa-bars"></i>
                Moj profil
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
        <main>
          <div class="update">
              <div class="row">
                <h2>Postavke</h2>
                  <ul>
                    <li>
                      <a href="mojprofil_trener.php">Osnovne informacije</a>
                    </li>
                    <li class="active_li">
                      <a href="#">Promena lozinke</a>
                    </li>
                    <li>
                      <a href="avatar_k.php">Avatar</a>
                    </li>
                  </ul>
              </div>
              <form role="form" action="code.php" method="post" enctype="multipart/form-data">
                  <div class="contact-form-text">
                      <label for="lozinka_stara" style="color: black; padding-bottom: 15px;">Trenutna lozinka:</label>
                      <input type="password" name="lozinka_stara" required>
                  </div>
                  <div class="contact-form-text">
                      <label for="lozinka" style="color: black; padding-bottom: 15px;">Nova lozinka:</label>
                      <input type="password" name="lozinka" required>
                  </div>
                  <div class="contact-form-text">
                      <label for="lozinka_potvrda" style="color: black; margin-bottom: 15px;">Potvrda lozinke:</label>
                      <input type="password" name="lozinka_potvrda">
                  </div>
                  <div class="contact-form-text">
                    <a href="coordinatorPanel.php" style="color: white; display: inline-block; width:100px;height:41px;text-align: center;
                    padding-top: 10px; background:#FF4646;font-size: 15px;">
                      Odustani
                    </a>

                    <input type="hidden" type="submit" name="korisnicko_ime" value="<?= $rows['korisnicko_ime'];?>">
                    <button type="submit" name="update_password_k" style="background: #1597BB;width:100px;">
                      Ažuriraj
                    </button>
                  </div>
              </form>
          </div>
        </main>
        <?php
          }
        ?>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
