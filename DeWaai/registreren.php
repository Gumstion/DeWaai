<?php
    include 'includes/header.php';
?>
    <div class="contact-clean">
        <form method="post">
            <h2 class="text-center">Registreren </h2>
     <!--       <div class="form-group has-success has-feedback">
                <input class="form-control" type="text" name="vnaam" required="" placeholder="Voornaam"><i class="form-control-feedback glyphicon glyphicon-ok" aria-hidden="true"></i></div>
            <input class="form-control" type="text" name="anaam" required="" placeholder="Achternaam">
            <div class="form-group has-error has-feedback">
                <input class="form-control" type="email" name="email" required="" placeholder="Email"><i class="form-control-feedback glyphicon glyphicon-remove" aria-hidden="true"></i>
                <p class="help-block">Vul een correct emailadres in.</p>
            </div>-->
            <div class="form-group">
                <input class="form-control" type="text" name="vnaam" required="" placeholder="Voornaam"
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