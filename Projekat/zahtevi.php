<?php
include "code.php";
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: adminPanel.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> -->
    <link rel="icon" href="./img/logo.PNG" type="image/gif" >
    <title>Zlatni pojas - Zahtevi</title>
    <style>
        /* USPESNO ODOBRENO */
        div.uspesno-odobrenje {
            width: 560px;
            padding: 20px 0px 20px 20px;
            margin: 10px 0;
            font-size: 16px;
            background-color: #9fe6a0;
            position: relative;
            border-left: 6px solid #4aa96c;
            /* display: none; */
        }
        div.uspesno-odobrenje p span {
            font-weight: bold !important;
        }
        div.uspesno-odobrenje i {
            padding: 0 10px 0 0;
            color: #4aa96c;
            font-size: 20px;
        }
        div.uspesno-odobrenje i.fa-times {
            font-size: 25px;
            position: absolute;
            top: 7px;
            right: 0;
        }
        div.uspesno-odobrenje i.fa-times:hover {
            cursor: pointer;
            color: #564a4a;
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
        /* USPESNO IZBRISANO KRAJ */
        .table {
            width: 100%;
            display: table;
            font-size: 14px;
            table-layout: fixed;
            border-collapse: collapse;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
        }
        .table th, .table td {
            padding: 12px 15px;
            display: table-cell;
            text-align: center;
            border-bottom: 2px solid #ddd;
            vertical-align: middle;
            word-wrap: break-word;
            width: 10%;
            /* width: 10%; */
        }
        .table th {
            background-color: #ec4646;
            color: white;
        }
        .table tbody td {
            background-color: #fff;
        }
        /* RESPONSIVE */
        @media(max-width: 1200px)
        {
            .table thead
            {
                display: none;
            }
            .table, .table tbody, .table tr, .table td
            {
                display: block;
                width: 100%;
            }
            .table tr
            {
                margin-bottom: 15px;
            }
            .table td
            {
                text-align: right;
                padding-left: 50%;
                text-align: right;
                position: relative;
            }
            .table td:before
            {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
                color: #104e8b;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-naslov">
            <a href="index.php"><img src="./img/logo.PNG" class="logo" alt="Logo" width="40px" height="40px" id="logo"></a>
            <h2>Zlatni pojas</h2>
        </div>
        <!-- INFO ABOUT LOGIN USER start -->
        <div class="sidebar-brands">
          <?php
            include("conn.php");
            $query="SELECT * FROM `admin_table` WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]'";
            $result=mysqli_query($conn, $query);

            while($rows=mysqli_fetch_assoc($result))
            {
          ?>
          <img src="<?php echo $rows['profilna']?>" class="logo" alt="Logo" width="90px" height="90px" id="logo" style="margin:0 0 5px 0;">
          <h4 style="margin-bottom: 5px;"><?php echo $rows['korisnicko_ime']?></h4>
          <p style="margin-bottom: 50px;"><?php echo $rows['uloga']?></p>
        </div>
        <!-- INFO ABOUT LOGIN USER end -->

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
            <li class="active">
                <a href=""><i class="far fa-user-circle"></i>Zahtevi</span></a>
            </li>
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
                Zahtevi
            </h2>

            <div class="user-wrapper">
                <ul>
                    <li id="profile">
                        <a href="#"><i class="fas fa-user-circle"></i>Belkisa Dazdarević<i class="fas fa-angle-down"></i></a>
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
        <?php
            if(isset($_SESSION['status_odobreno']))
            {
        ?>
            <div class="uspesno-odobrenje">
                <i class="fas fa-times" class="close" onclick="this.parentElement.style.display='none';"></i>
                <p><i class="fas fa-exclamation-circle"></i><span>Hej!</span> <?php echo $_SESSION['status_odobreno']; ?></p>
            </div>
        <?php
            unset($_SESSION['status_odobreno']);
            }
        ?>

        <?php
            if(isset($_SESSION['status_izbrisano']))
            {
        ?>
            <div class="uspesno-izbrisano" id="uspesno-izbrisano">
                <i class="fas fa-times" class="close" onclick="this.parentElement.style.display='none';"></i>
                <script type="text/javascript" src="./js/main.js"></script>
                <p><i class="fas fa-exclamation-circle"></i><span>Hej!</span> <?php echo $_SESSION['status_izbrisano']; ?></p>
            </div>
        <?php
            unset($_SESSION['status_izbrisano']);
            }
        ?>

        <?php
            include_once("conn.php");
            $sql="SELECT * FROM pom_tabela";
            $results=mysqli_query($conn, $sql);

            if(mysqli_num_rows($results)>0)
            { //ovde je GRESKA
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Uloga</th>
                    <th>Profilna</th>
                    <th>Država</th>
                    <th>Datum rođenja</th>
                    <th>Email</th>
                    <th>Odobri</th>
                    <th>Izbriši</th>
                </tr>
            </thead>
            <?php
                while($rows=mysqli_fetch_assoc($results))
                {
                  $query2="SELECT id_admina FROM `admin_table` WHERE `korisnicko_ime`='$_SESSION[AdminLoginId]'";
                  $result2=mysqli_query($conn, $query2);

                  while($rows2=mysqli_fetch_assoc($result2))
                  {
            ?>
        </table>
        <table class="table">
                <tbody>
                    <tr>
                        <td data-label="ID"><?= $rows['id'];?></td>
                        <td data-label="Ime"><?= $rows['ime']?></td>
                        <td data-label="Prezime"><?= $rows['prezime']?></td>
                        <td data-label="Uloga"><?= $rows['uloga']?></td>
                        <td data-label="Profilna"><img src="<?php echo $rows['profilna']?>" alt="Profilna" width="50px" height="50px" style="border-radius: 50%;"></td>
                        <td data-label="Država"><?php echo $rows['drzava_rodjenja']?></td>
                        <td data-label="Mesto"><?php echo $rows['datum_rodjenja']?></td>
                        <td data-label="Email"><?= $rows['email']?></td>
                        <td data-label="Odobri">
                        <form action="code.php" method="post" >
                            <input type="hidden" type="submit" name="add_user_id" value="<?= $rows['id'];?>">
                            <input type="hidden" type="submit" name="uloga" value="<?= $rows['uloga'];?>">
                            <input type="hidden" type="submit" name="email" value="<?= $rows['email'];?>">
                            <input type="hidden" type="submit" name="ime" value="<?= $rows['ime'];?>">
                            <input type="hidden" type="submit" name="prezime" value="<?= $rows['prezime'];?>">
                            <input type="hidden" type="submit" name="admin" value="<?= $rows2['id_admina'];?>">
                            <button type="submit" name="add_user" style="border: 0; padding: 10px; height: 50px; width: 75px; color: white; background: #a2de96;text-align:center; cursor: pointer;font-size: 16px;">
                                Odobri
                            </button>
                        </form>
                        </td>
                        <td data-label="Izbriši">
                        <form action="code.php" method="post">
                            <input type="hidden" type="submit" name="delete_user_id" placeholder="Izbriši" value="<?= $rows['id'];?>">
                            <input type="hidden" type="submit" name="user_email" placeholder="Email" value="<?= $rows['email'];?>">
                            <button type="submit" name="delete_user" style="border: 0; padding: 10px; height: 50px; width: 75px; color: white; background: red;text-align:center; cursor: pointer;font-size: 16px;">
                                Izbriši
                            </button>
                        </form>
                        </td>
                    </tr>
                </tbody>
        </table>
            <?php
                    }
                }}
                // else echo "TRENUTNO NEMA ZAHTEVA ZA REGISTRACIJU."
            ?>
            <?php
                }
            ?>
        </main>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
