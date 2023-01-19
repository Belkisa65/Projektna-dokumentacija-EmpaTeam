<?php
include "code.php";
// session_start();
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
        .update {
          background-color: #fff;
        }
        .update input {
          padding-left: 10px;
        }
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
            background-color: #104e8b;
            color: #fff;
            font-size: 1rem;
        }
        .table tbody td {
            background-color: #fff;
        }
        /* RESPONSIVE */
        @media(max-width: 800px)
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
        .fa-pencil-alt {
            color: #1597BB;
            background-color: #E8EAE6;
            padding: 10px;
            font-size: 1rem;
            border-radius: 50%;
        }
        .fa-pencil-alt:hover {
            background-color: lightgrey;
            cursor: pointer;
            transition: .2s;
        }
        .fa-trash {
            color: #FF4646;
            background-color: #E8EAE6;
            padding: 10px;
            font-size: 1rem;
            border-radius: 50%;
        }
        .fa-trash:hover {
            background-color: lightgrey;
            cursor: pointer;
            transition: .2s;
        }
        .search-add {
            outline: none;
            display: flex;
            justify-content: space-between;
            margin: 10px 0 45px;
            background: #fff;
            height: 100px;
            align-items: center;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
        }
        .search-add button {
            margin: 0;
            padding: 0;
            width: 130px;
            border-radius: 10px;
            margin-right: 20px;
            background: #104e8b;
            font-size: 15px;
        }
        .search-add button:hover {
           box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
        }
        .search-add div {
            margin-left: 50px;
            display: flex;
            justify-content: center;
        }
        .search-add div input {
            width: 200px;
            height: 35px;
            border: 1px solid #104e8b;
            border-radius: 20px;
            padding-left: 10px;
            margin-left: 10px;
        }
        .search-add div button {
          width: 50px;
          border-radius: 20px;
          height: 35px;
          margin-right: 10px !;
        }
        .search-add div i {
            background: #104e8b;
            color: #fff;
            font-size: 16px;
        }
        .btn-pagination {
            color: #104e8b;
            border: 1px solid #104e8b;
            padding: 5px;
            margin: 4px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .btn-pagination:hover {
            background: #104e8b;
            color: white;
            transition: .5s;
        }
        .pagination-item {
            display: flex;
            justify-content: center;
        }
        .active {
            background: #104e8b;
            color: #fff;
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
            <img src="./img/bekica2.png" class="logo" alt="Logo" width="90px" height="90px" id="logo" style="margin:0 0 5px 0;">
            <h4 style="margin-bottom: 5px;">
                Belkisa Dazdarević
            </h4>
            <p style="margin-bottom: 50px;">Administrator</p>
        </div>
        <div class="sidebar-menu">
            <li>
                <a href="adminPanel.php"><i class="fas fa-home"></i><span>Radna ploča</span></a>
            </li>
            <li class="toggle1" onclick="change()">
                <a href="#"><i class="fas fa-users"></i><span>Korisnici</span><i class="fas fa-angle-down" style="padding-left: 83.5px;"></i></a>
            </li>
            <ul class="dropDown">
                <li class="active" id="nested1" class="activeNested"><a href="#">Administratori</a></li>
                <li id="nested2" class="activeNested"><a href="#">Koordinatori</a></li>
                <li id="nested3" class="activeNested" onclick="change3()"><a href="#">Takmičari<i class="fas fa-angle-down" style="padding-left: 52px;"></i></a></li>
                <ul class="dropDown">
                    <li id="nested111" class="activeNested activeNestedStyle"><a href="#">Pojedinačno</a></li>
                    <li id="nested222" class="activeNested activeNestedStyle"><a href="#">Timovi</a></li>
                </ul>
            </ul>
            <li>
                <a href=""><i class="far fa-user-circle"></i>Zahtevi</span></a>
            </li>
            <li>
                <a href=""><i class="far fa-newspaper"></i><span>Novosti</span></a>
            </li>
            <li class="toggle2" onclick="change2()">
                <a href="#"><i class="far fa-list-alt"></i><span>Objave</span><i class="fas fa-angle-down" style="padding-left: 101px;"></i></a>
            </li>
            <ul class="dropDown">
                <li id="nested11" class="activeNested"><a href="#">Vesti</a></li>
                <li id="nested22" class="activeNested"><a href="#">Galerija</a></li>
                <li id="nested33" class="activeNested"><a href="#">Turniri</a></li>
            </ul>
            <li>
                <a href=""><i class="far fa-question-circle"></i>Najčešća pitanja</span></a>
            </li>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <i class="fas fa-bars"></i>
                Administratori
            </h2>

            <!-- <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="search" placeholder="Search here">
            </div> -->

            <div class="user-wrapper">
                <ul>
                    <li><a href="#"><i class="far fa-envelope"></i></a></li>
                    <li><a href="#"><i class="fas fa-bell"></i></a></li>
                    <li id="profile">
                        <a href="#"><i class="fas fa-user-circle"></i>Belkisa Dazdarević<i class="fas fa-angle-down"></i></a>
                        <div id="drop-down">
                            <a href="mojprofil.php" class="clinks"><i class="fas fa-user-circle"></i>Profil</a>
                            <a href="#" class="clinks"><i class="fas fa-cog"></i>Podešavanja</a>
                            <form action="code.php" method="post">
                                <button type="submit" name="logout" class="clinks btn-logout" style="padding-right: 115px; background-color: #f1f5f9;"><i class="fas fa-power-off"></i>Odjavi se</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <?php
          include_once("conn.php");
          if(isset($_POST['update_admin']))
          {
              $id_admina = $_POST['id_admina'];
              $sql="SELECT * FROM admin_table WHERE id_admina='$id_admina'";
              $query_run = mysqli_query($conn, $sql);


              // if(is_array($query_run) || is_object($query_run))
              // {
                  foreach ($query_run as $rows)
                  {

        ?>
        <main>
          <div class="update">
              <form action="code.php" method="post">
                <div class="contact-form-text">
                    <label for="id_admina" style="color: black;">ID:</label>
                    <input type="text" name="id_admina" id="" value="<?php echo $rows['id_admina']?>">
                </div>
                <div class="contact-form-text">
                    <label for="ime_update" style="color: black;">Ime:</label>
                    <input type="text" name="ime_update" id="ime_update" value="<?php echo $rows['ime']?>">
                </div>
                <div class="contact-form-text">
                    <label for="prezime_update" style="color: black;">Prezime:</label>
                    <input type="text" name="prezime_update" id="prezime_update" value="<?php echo $rows['prezime']?>">
                </div>
                <div class="contact-form-text">
                    <label for="drzava_rodjenja_update" style="color: black;">Država:</label>
                    <input type="text" name="drzava_rodjenja_update" id="drzava_rodjenja_update" value="<?php echo $rows['drzava_rodjenja']?>">
                </div>
                <div class="contact-form-text">
                    <label for="mesto_rodjenja_update" style="color: black;">Mesto:</label>
                    <input type="text" name="mesto_rodjenja_update" id="mesto_rodjenja_update" value="<?php echo $rows['mesto_rodjenja']?>">
                </div>
                <div class="contact-form-text">
                    <label for="email_update" style="color: black;">Email:</label>
                    <input type="email" name="email_update" id="email_update" value="<?php echo $rows['email']?>">
                </div>
                <div class="contact-form-text">
                    <label for="uloga_update" style="color: black;">Uloga:</label>
                    <select id="uloga_update" name="uloga_update" required>
                        <option value="Admin">Admin</option>
                        <option value="Takmicar" width="100px">Takmičar</option>
                        <option value="Trener">Trener</option>
                    </select>
                </div>
                <div class="contact-form-text">
                      <a href="admini.php" style="color: white; display: inline-block; width:100px;height:41px;text-align: center;
                      padding-top: 10px; background:#FF4646;font-size: 15px;">
                        Odustani
                      </a>
                      <button type="submit" name="update" style="background: #1597BB;width:100px;">
                        Dodaj
                      </button>
                </div>
              </form>
            </div>
        </main>
        <?php
                }
            // }
        }
        ?>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
