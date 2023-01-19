<?php include_once 'headerr.php' ?>
<body class="prijava">
    <main>
        <?php
        if( isset($_POST['submit'])) {
            echo "<h1 style='color:red'>Radi :D</h1>";
        }
        ?>
        <a href="index.html"><img src="./img/logo.PNG" alt="Logo" width="150px" height="150px" id="logo"></a> 
        <h2>Karate turnir "ZLATNI POJAS"</h2>
        <p>Unesite podatke za registraciju.</p>
        <small class="ispis"></small>
        <form role="form" action="signup.php" method="post">
            <div class="contact-form-text">
                <small id="ispis1"></small>
                <input type="text" name="UserName" id="" placeholder="Ime">
            </div>
            <div class="contact-form-text">
                <input type="text" name="UserSurname" id="" placeholder="Prezime">
            </div>
            <div class="contact-form-text">
                <input type="text" name="UserPB" id="" placeholder="Mesto rođenja">
            </div>
            <div class="contact-form-text">
                <input type="text" name="UserCB" id="" placeholder="Država rođenja">
            </div>
            <div class="contact-form-text">
                <input type="number" name="UserJmbg" id="" placeholder="JMBG">
            </div>
            <div class="contact-form-text">
                <input type="email" name="UserEmail" id="" placeholder="Email">
            </div>
            <div class="contact-form-text">
                <input type="text" name="User" id="" placeholder="Korisničko ime">
            </div>
            <div class="contact-form-text">
                <input type="password" name="password" id="" placeholder="Lozinka">
            </div>
            <div class="contact-form-text">
                <input type="password" name="password" id="" placeholder="Potvrda lozinke">
            </div>
            <label for="profilna" class="profilna">Profilna fotografija:</label>
            <input type="file" name="" id="profilna">
            <div class="contact-form-text">
                <p class="pol">Pol:</p><br>
                <label for="male" class="pol1">M</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female" class="pol1">Ž</label><br>
                <input type="radio" id="female" name="gender" value="female">
            </div>
            <label for="users" id="user">Registrujem se kao:</label>
            <select id="users" name="users">
                <option value="takmicar" width="100px">Takmičar</option>
                <option value="trener">Trener</option>
                <option value="admin">Admin</option>
            </select>
            <div class="contact-form-text">
                <label for="discipline" id="" class="disciplina">Izaberite disciplinu(e):</label><br><br>
                <label for="katep" class="pol1"> Kate pojedinačno</label><br>
                <input type="checkbox" id="katep" name="katep">
                <label for="katee" class="pol1"> Kate ekipno</label><br>
                <input type="checkbox" id="katee" name="katee">
                <label for="borbep" class="pol1"> Borbe pojedinačno</label><br>
                <input type="checkbox" id="borbep" name="borbep">
                <label for="borbee" class="pol1"> Borbe ekipno</label>
                <input type="checkbox" id="borbee" name="borbee">
            </div>
            <div class="contact-form-text">
                <input type="email" name="UserEmail" id="" placeholder="Kilaža">
            </div>
            <div class="contact-form-text">
                <input type="email" name="UserEmail" id="" placeholder="Ime kluba">
            </div>
            <input type="submit" name="submit" value="REGISTRUJ SE" id="btn" style="width: 360px !important;background-color: red;border: 0;padding-left: 15px;margin-left: 20px; height: 40px;">
        </form>
    </main>
</body>
</html>