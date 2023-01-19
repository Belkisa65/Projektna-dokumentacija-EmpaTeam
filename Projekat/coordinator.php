?php
session_start();
if(!isset($_SESSION['CoordinatorLoginId'])) {
    header("location:adminPanel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="icon" href="./img/logo.PNG" type="image/gif" >
    <title>Zlatni pojas - Admin Panel</title>
</head>
<body>
    <!--HEADER-->
    <div class="header">
        <div class="container">
            <div class="navbar2">
                <div class="row1">
                    <ul>
                        <li><i class="far fa-clock" id="clock"></i>Pon-Pet / 09-21h</li>
                        <li><a href="mailto:zlatnipojascacka@gmail.com" class="email"><i class="far fa-envelope" id="email"></i>zlatnipojascacka@gmail.com</a></li>
                        <li><a href="#" class="links link1"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="links"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="links"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="navbar">
            <div class="container">
                <div class="row">
                    <p><a href="index.html"><img src="./img/logo.PNG" alt="Logo" width="80px" height="80px" id="logo"></a></p>
                    <ul>
                        <li style="margin-top: 10px;"><a href="#"><i class="fas fa-pencil-alt" style="color: white"></i> Vesti</a></li>
                        <form method="post">
                            <button name="logout" style="width:120px; background: #104e8b; text-transform: uppercase;font-size: 15px;">Odjavi se</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['logout'])) {
            session_destroy();
            header("location:prijava.php");
        }
        ?>
        <div>
            <h1>Dobro došao, <?php echo $_SESSION['CoordinatorLoginId']?>!</h1>
        </div>
</body>
</html>
