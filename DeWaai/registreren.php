<?php
    include 'includes/header.php';
?>
    <!--Registratieformulier-->
    <div class="contact-clean">
        <form action="functions/register.php" method="post">
            <h2 class="text-center">Registreren </h2>
            <div class="form-group">
                <input class="form-control" type="text" name="vnaam" required="" placeholder="Voornaam">
                <input class="form-control" type="text" name="anaam" required="" placeholder="Achternaam">
                <input class="form-control" type="email" name="email" required="" placeholder="Email">
                <input class="form-control" type="number" name="telefoon" required="" placeholder="Telefoon">
                <input class="form-control" type="text" name="iban" placeholder="IBAN">
                <input class="form-control" type="text" name="woonplaats" required="" placeholder="Woonplaats">
                <input class="form-control" type="text" name="straat" required="" placeholder="Straat">
                <input class="form-control" type="text" name="huisnummer" required="" placeholder="Huisnummer">
                <input class="form-control" type="text" name="postcode" required="" placeholder="Postcode">
                <input class="form-control" type="password" name="wachtwoord" required="" placeholder="Wachtwoord">
                <input class="form-control" type="password" name="wachtwoord2" required="" placeholder="Herhaal Wachtwoord">
                <button class="btn btn-primary" type="submit">Registreren </button>
            </div>
        </form>
    </div>
<?php
    include 'includes/footer.php';
?>