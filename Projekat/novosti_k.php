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
              $query="SELECT * FROM `coordinator_table` WHERE `korisnicko_ime`='$_SESSION[CoordinatorLoginId]'";
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
              <a href="coordinatorPanel.php"><i class="fas fa-home"></i><span>Radna ploča</span></a>
          </li>
          <li>
              <a href="takmicari_k.php"><i class="fas fa-users"></i><span>Takmičari</span></a>
          </li>
          <li>
              <a href="turniri.php"><i class="fas fa-medal"></i><span>Turniri</span></a>
          </li>
          <li class="active">
              <a href="novosti_k.php"><i class="far fa-newspaper"></i><span>Novosti</span></a>
          </li>

        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <i class="fas fa-bars"></i>
                Novosti
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
              if(isset($_SESSION['status_delete_admin']))
              {
          ?>
              <div class="uspesno-izbrisano">
                  <i class="fas fa-times" class="close" onclick="this.parentElement.style.display='none';"></i>
                  <p><i class="fas fa-exclamation-circle"></i><span>Hej!</span> <?php echo $_SESSION['status_delete_admin']; ?></p>
              </div>
          <?php
              unset($_SESSION['status_delete_admin']);
              }
          ?>

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
          <!-- TURNIRI -->
          <div class="update">
            <h1 style="padding-bottom:20px;padding-top: 20px;">Turniri</h1>
            <div class="galerija">
            <?php
                  include_once("conn.php");
                  $sql="SELECT * FROM turniri INNER JOIN coordinator_table on turniri.id_koordinatora = coordinator_table.id WHERE `korisnicko_ime`='$_SESSION[CoordinatorLoginId]'";
                  // WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]';
                  $results=mysqli_query($conn, $sql);
                  if(mysqli_num_rows($results)>0)
                  {
                      while($rows=mysqli_fetch_assoc($results))
                      {
              ?>
              <div>
                 <h2 style="color: #104e8b; font-weight: bold; padding-left: 30px;margin-bottom: 10px; font-size: 25px; min-height: 15px; width: 290px;">
                   <?php echo substr($rows['naziv'], 0, 100)." "?>
                 </h2>
                 <p style="color: gray;  padding-left: 30px;padding-bottom: 5px; font-size: 13px;">
                   Kategorija:  <?php echo $rows['kategorija']?>
                 </p>
                 <p style="color: gray;  padding-left: 30px;padding-bottom: 5px; font-size: 13px;">
                   Disciplina:  <?php echo $rows['disciplina']?>
                 </p>
                 <p style="color: gray;  padding-left: 30px;padding-bottom: 5px; font-size: 13px;">
                   <i class="fas fa-user-edit"></i>  <?php echo $rows['ime']." ".$rows['prezime']?>
                 </p>
                 <p style="color: gray; font-size: 14px; padding-left:30px;padding-bottom: 5px; font-size: 13px;">
                   <i class="far fa-calendar-alt"></i>  <?php echo date("Y-m-d");?>
                 </p>
                 <p style="color: black; padding-left: 30px;margin-bottom: 10px; font-size: 15px; min-height: 15px; width: 290px;">
                   <?php echo substr($rows['opis'], 0, 30)."..."?>
                 </p>
                 <div class="buttons">
                   <form action="code.php" method="post">
                    <input
                        type="hidden" name="id_turnira"
                        placeholder="Izbriši" value="<?= $rows['id_turnira'];?>">
                     <button
                        type="submit" name="delete_tournament" onclick="return deletePost()"
                        style="background: #ec4646; width: 100px; margin: 10px 0px 10px 40px;">
                       Izbriši
                     </button>
                   </form>
                   <form action="detaljnijeTurnir.php" method="post">
                     <input
                        type="hidden" name="id_turnira"
                        placeholder="Izbriši" value="<?= $rows['id_turnira'];?>">
                        <button
                           type="submit" name="detaljnije_t"
                           style="outline: 2px solid #1597BB; background: #fff; color: #1597BB; width: 100px; margin: 10px 0px 10px 30px;">
                          Detaljnije
                        </button>
                   </form>
                 </div>
              </div>
              <?php
                  }
                }
              ?>
          </div>
          </div>
          <!-- VESTI -->
          <div class="update">
            <h1 style="padding-bottom:20px;padding-top: 20px;">Vesti</h1>
            <div class="galerija">
            <?php
                  include_once("conn.php");
                  $sql="SELECT * FROM vesti INNER JOIN admin_table on vesti.id_admina = admin_table.id_admina";
                  // WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]';
                  $results=mysqli_query($conn, $sql);
                  if(mysqli_num_rows($results)>0)
                  {
                      while($rows=mysqli_fetch_assoc($results))
                      {
              ?>
              <div>
                 <img style="margin: 10px 0 10px 20px;" src="<?php echo $rows['slika'];?>" alt="Photo from gallery" width="280px" height="300px">
                 <p style="color: #104e8b; font-weight: bold; padding-left: 30px;margin-bottom: 10px; font-size: 15px; min-height: 15px; width: 290px;">
                   <?php echo substr($rows['naslov'], 0, 30)."..."?>
                 </p>
                 <p style="color: gray;  padding-left: 30px;padding-bottom: 5px; font-size: 13px;">
                   <i class="fas fa-user-edit"></i>  <?php echo $rows['ime']." ".$rows['prezime']?>
                 </p>
                 <p style="color: gray; font-size: 14px; padding-left:30px;padding-bottom: 5px; font-size: 13px;">
                   <i class="far fa-calendar-alt"></i>  <?php echo date("Y-m-d");?>
                 </p>
                 <p style="color: black; padding-left: 30px;margin-bottom: 10px; font-size: 15px; min-height: 15px; width: 290px;">
                   <?php echo substr($rows['sadrzaj'], 0, 30)."..."?>
                 </p>
                 <div class="buttons">
                   <form action="detaljnijeVest.php" method="post">
                     <input
                        type="hidden" name="id_vesti"
                        placeholder="Izbriši" value="<?= $rows['id_vesti'];?>">
                        <button
                           type="submit" name="detaljnije_v"
                           style="outline: 2px solid #1597BB; background: #fff; color: #1597BB; width: 100px; margin: 10px 0px 10px 30px;">
                          Detaljnije
                        </button>
                   </form>
                 </div>
              </div>
              <?php
                  }
                }
              ?>
          </div>
        </div>
        <!-- GALERIJA -->
          <div class="update">
            <h1 style="padding-bottom:20px;padding-top: 20px;">Galerija</h1>
            <div class="galerija">
                <?php
                      include_once("conn.php");
                      $sql="SELECT * FROM slike INNER JOIN admin_table on slike.id_admina = admin_table.id_admina";
                      // WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]';
                      $results=mysqli_query($conn, $sql);
                      if(mysqli_num_rows($results)>0)
                      {
                          while($rows=mysqli_fetch_assoc($results))
                          {
                  ?>
                            <div>
                               <img style="margin: 10px 0 10px 20px;" src="<?php echo $rows['slika'];?>" alt="Photo from gallery" width="280px" height="300px">
                               <p style="color: #104e8b; font-weight: bold; padding-left: 30px;margin-bottom: 10px; font-size: 15px; min-height: 15px; width: 290px;">
                                 <?php echo substr($rows['opis'], 0, 50)."..."?>
                               </p>
                               <p style="color: gray;  padding-left: 30px;padding-bottom: 5px; font-size: 13px;">
                                 <i class="fas fa-user-edit"></i>  <?php echo $rows['ime']." ".$rows['prezime']?>
                               </p>
                               <p style="color: gray; font-size: 14px; padding-left:30px;padding-bottom: 5px; font-size: 13px;">
                                 <i class="far fa-calendar-alt"></i>  <?php echo date("Y-m-d");?>
                               </p>
                            </div>
                  <?php
                          }
                        }
                  ?>
                  <script>
                      function deletePost() {
                        var data = confirm("Da li ste sigurni da želite izbrisati turnir?");
                        if(data == true) {
                          return true;
                        } else {
                          return false;
                        }
                      }
                  </script>
          </div>
        </main>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
