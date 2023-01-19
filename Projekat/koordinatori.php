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
    <title>Zlatni pojas - Koordinatori</title>
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
        /* USPESNO ODOBRENO */
        div.uspesno-update {
            width: 560px;
            padding: 20px 0px 20px 20px;
            margin: 10px 0;
            font-size: 16px;
            background-color: #9fe6a0;
            position: relative;
            border-left: 6px solid #4aa96c;
            /* display: none; */
        }
        div.uspesno-update p span {
            font-weight: bold !important;
        }
        div.uspesno-update i {
            padding: 0 10px 0 0;
            color: black;
            font-size: 20px;
        }
        div.uspesno-update i.fa-times {
            font-size: 25px;
            position: absolute;
            top: 7px;
            right: 0;
        }
        div.uspesno-update i.fa-times:hover {
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
            width: 170px;
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
              <li class="active" id="nested2" class="activeNested"><a href="koordinatori.php">Koordinatori</a></li>
              <li id="nested3" class="activeNested" onclick="change3()"><a href="#">Takmičari<i class="fas fa-angle-down" style="padding-left: 52px;"></i></a></li>
              <ul class="dropDown">
                  <li id="nested111" class="activeNested activeNestedStyle"><a href="takmicari.php">Pojedinačno</a></li>
                  <li id="nested222" class="activeNested activeNestedStyle"><a href="#">Timovi</a></li>
              </ul>
          </ul>
          <li>
              <a href="zahtevi.php"><i class="far fa-user-circle"></i>Zahtevi</span></a>
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
              Koordinatori
          </h2>


          <div class="user-wrapper">
              <ul>
                  <li id="profile">
                      <a href="#"><i class="fas fa-user-circle"></i><?php echo $rows['ime']." ".$rows['prezime']?><i class="fas fa-angle-down"></i></a>
                      <div id="drop-down">
                          <a href="#" class="clinks"><i class="fas fa-user-circle"></i>Profil</a>
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
          <!-- SEARCH BY NAME, SURNAME OR ROLE -->
          <?php
              include_once("conn.php");

              // PAGINATION
              if(isset($_GET['page']))
              {
                  $page = $_GET['page'];
              }
              else
              {
                  $page = 1;
              }

              $num_per_page = 5;
              $start_from = ($page-1) * 5;

              if(isset($_POST['search']) && !$_POST['search']=="")
              {
                $searchKey = $_POST['search'];
                $sql="SELECT * FROM coordinator_table
                WHERE ime LIKE '%$searchKey%'
                OR prezime LIKE '%$searchKey%'
                OR uloga LIKE '%$searchKey%'
                ";
              }
              else
              {
                $sql="SELECT * FROM coordinator_table LIMIT $start_from, $num_per_page";
                $searchKey = "";
              }
              $results=mysqli_query($conn, $sql);
              if(mysqli_num_rows($results)>0)
              {
          ?>

          <!-- UPDATE ADMIN -->
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

          <!-- DELETE ADMIN -->
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

          <!-- INSERT NEW ADMIN -->
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
        <div class="search-add">
            <div>
              <form class="" action="" method="post">
                <input name="search" type="search" placeholder="Pretraži" value=<?php echo $searchKey;?>>
                <button><i class="fas fa-search"></i></button>
              </form>
            </div>
            <button >
              <a href="addCoordinator.php" style="color: white;">
                Dodaj koordinatora
              </a>
            </button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="id" style="width:4%">ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Uloga</th>
                    <th>Profilna</th>
                    <th>Država</th>
                    <th>Mesto</th>
                    <th>Email</th>
                    <th style="width:7%">Ažuriraj</th>
                    <th style="width:7%">Izbriši</th>
                </tr>
            </thead>
            <?php
                while($rows=mysqli_fetch_assoc($results))
                {
            ?>
        </table>
        <table class="table">
                <tbody>
                    <tr>
                        <td data-label="ID" style="width:4%"><?= $rows['id'];?></td>
                        <td data-label="Ime"><?= $rows['ime']?></td>
                        <td data-label="Prezime"><?= $rows['prezime']?></td>
                        <td data-label="Uloga"><?= $rows['uloga']?></td>
                        <td data-label="Profilna"><img src="<?php echo $rows['profilna']?>" alt="Profilna" width="50px" height="50px" style="border-radius: 50%;"></td>
                        <td data-label="Država"><?php echo $rows['drzava_rodjenja']?></td>
                        <td data-label="Mesto"><?php echo $rows['mesto_rodjenja']?></td>
                        <td data-label="Email"><?= $rows['email']?></td>
                        <td data-label="Odobri" style="width:7%">
                        <form action="code.php" method="post" >
                            <input type="hidden" type="submit" name="id" placeholder="Dodaj" value="<?= $rows['id'];?>">
                            <button
                                type="submit" name="update_coordinator"
                                style="border: 0; padding: 10px; height: 50px; width: 75px; color: white;
                                background: #fff;text-align:center; cursor: default;font-size: 16px;">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                        </td>
                        <td data-label="Izbriši" style="width:7%">
                        <form action="code.php" method="post">
                            <input type="hidden" type="submit" name="delete_coordinator_id" placeholder="Izbriši" value="<?= $rows['id'];?>">
                            <input type="hidden" type="submit" name="user_email" placeholder="Email" value="<?= $rows['email'];?>">
                            <button
                                type="submit" name="delete_coordinator" onclick="return deleteCoordinator()"
                                style="border: 0; padding: 10px; height: 50px; width: 70px; color: white;
                                background: #fff;text-align:center; cursor: default;font-size: 16px;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                </tbody>
                <script>
                    function deleteCoordinator() {
                      var data = confirm("Da li ste sigurni da želite izbrisati koordinatora?");
                      if(data == true) {
                        return true;
                      } else {
                        return false;
                      }
                    }
                </script>
        </table>
            <?php
                    }
                }
                else echo "<button >
                  <a href='addCoordinator.php' style='color: white;'>
                    Dodaj koordinatora
                  </a>
                </button>";
                echo "<br>";
            ?>
            <?php
                // PAGINATION
                $pr_query = "SELECT * FROM coordinator_table";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);
                // echo "<br>";

                $total_page = ceil($total_record/$num_per_page);
            ?>
            <div class="pagination-item">

            <?php
                if($page>=2)
                {
                    echo "<a href='koordinatori.php?page=".($page-1)."' class='btn-pagination'>&laquo;</a>";
                }

                for($i = 1; $i <= $total_page; $i++)
                {
                    if ($i == $page)
                    {
                        echo "<a class = 'btn-pagination active' href='koordinatori.php?page=".$i."'>".$i." </a>";
                    }

                    else
                    {
                        echo "<a href='koordinatori.php?page=".$i."' class='btn-pagination'>$i</a>";
                    }
                }

                if($page<$total_page)
                {
                    echo "<a href='koordinatori.php?page=".($page+1)."' class='btn-pagination'>&raquo;</a>";
                }
            ?>
            </div>
        </main>
    </div>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>
