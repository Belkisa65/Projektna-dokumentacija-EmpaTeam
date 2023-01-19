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
    <title>MigApp</title>
    <style>
    /* USPESNO AZURIRANO */
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

    @media screen and (max-width: 960px) {
      .cards {
        grid-template-columns: repeat(3, 1fr);
      }
      .main-content i  {
        display: none;
      }

      @media screen and (max-width: 760px) {
        .cards {
          grid-template-columns: repeat(2, 1fr);
        }
        @media screen and (max-width: 550px) {
          .cards {
            grid-template-columns: repeat(1, 1fr);
          }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Svedska', 'Hours per Day'],
          ['Norveska',     11],
          ['Turska',      2],
          ['Nemacka',  2],
          ['Tajland', 2],
          ['BiH',    7]
        ]);

        var options = {
          title: 'Zastupljenost partnerskih organizacija u projektu'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div class="sidebar">
        <div class="logo-naslov">
            <a href="index.php"><img src="./img/logo.PNG" class="logo" alt="Logo" width="40px" height="40px" id="logo"></a>
            <h2>MigApp</h2>
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
            <h4 style="margin-bottom: 5px;"><?php echo $rows['korisnicko_ime']?></h4>
            <p style="margin-bottom: 50px;"><?php echo $rows['uloga']?></p>
        </div>
        <div class="sidebar-menu">
            <li class="active">
                <a href=""><i class="fas fa-home"></i><span>Radna ploča</span></a>
            </li>
            <li>
                <a href="migranti.php"><i class="fas fa-users"></i><span>Migranti</span></a>
            </li>
            <li>
                <a href="novosti.php"><i class="far fa-newspaper"></i><span>Novosti</span></a>
            </li>
            <li>
                <a href="vesti2.php"><i class="far fa-list-alt"></i><span>Vesti</span></a>
            </li>
        </div>
    </div>
    <div class="main-content content">
        <header>
            <h2>
                <i class="fas fa-bars"></i>
                Radna ploča
            </h2>

            <div class="user-wrapper">
                <ul>
                    <li id="profile">
                        <a href="#"><i class="fas fa-user-circle"></i><?php echo $rows['ime']." ".$rows['prezime']?><i class="fas fa-angle-down"></i></a>
                        <div id="drop-down">
                            <a href="mojprofil.php" type="submit" class="clinks"><i class="fas fa-user-circle"></i>Profil</a>
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
          <?php
              if(isset($_SESSION['status_update']))
              {
          ?>
              <div class="uspesno-update1">
                  <i class="fas fa-times" class="close" onclick="this.parentElement.style.display='none';"></i>
                  <p><i class="fas fa-exclamation-circle"></i><span>Hej!</span> <?php echo $_SESSION['status_update']; ?></p>
              </div>
          <?php
              unset($_SESSION['status_update']);
              }
          ?>
            <div class="cards">
                <div class="card-single">
                    <div class="numbers">
                        <h1>7</h1>
                        <img src="./img/group.png" height="50px" width="50px">
                    </div>
                        <p>Korisnika</p>
                </div>
                <div class="card-single">
                    <div class="numbers">
                        <h1>12</h1>
                        <img src="./img/request.png" height="50px" width="50px">
                    </div>
                        <p>Takmičari</p>
                </div>
                <div class="card-single">
                    <div class="numbers">
                        <h1>3</h1>
                        <img src="./img/group.png" height="50px" width="50px">
                    </div>
                        <p>Timovi</p>
                </div>
                <div class="card-single">
                    <div class="numbers">
                        <h1>27</h1>
                        <img src="./img/blog.png" height="50px" width="50px">
                    </div>
                    <div>
                        <p>Objave</p>
                    </div>
                </div>
            </div>
            <div id="piechart" style="width: 596px; height: 300px;margin-top: 50px;box-shadow: 2px 2px 5px rgba(0,0,0,0.3);"></div>
            /* <div id="chart_div" style="width: 596px; height: 500px;"></div> */
        </main>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
