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
</head>
<body class="prijava">
    <main>
        <a href="index.php"><img src="./img/logo.PNG" alt="Logo" width="150px" height="150px" id="logo"></a>
        <h2 style="margin-left: 70px;">MigApp aplikacija</h2>
        <p>Unesite podatke za prijavu.</p>
        <form method="post" action="code.php">
            <div class="contact-form-text">
                <small id="ispis1"></small>
                <input type="text" name="name" id="name" placeholder="Korisničko ime" required>
            </div>
            <div class="contact-form-text">
                <input type="password" name="password" id="password" placeholder="Lozinka" required>
            </div>
            <div class="contact-form-text">
                <button type="submit" name="submit">PRIJAVA</button>
            </div>
        </form>
       <p class="nalog">Nemate nalog? <a href="registracija.php" class="registruj">Registrujte se</a></p>
    </main>
</body>
</html>
