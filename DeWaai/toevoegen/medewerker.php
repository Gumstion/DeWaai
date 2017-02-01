<?php
/**
 * Created by PhpStorm.
 * User: Gerrit A. Wieberdink
 * Date: 31-1-2017
 * Time: 13:44
 */?>
<?php
include '../includes/header.php';
?>
    <!--Formulier medewerker toevoegen-->
    <div class="contact-clean">
        <form action="" method="post">
            <h2 class="text-center">Medewerker toevoegen </h2>
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
                <select name="cursus">
                    <option value="1">Admin</option>
                    <option value="2">Medewerker</option>
                    <option value="3">Cursist</option>
                </select><br>
                <button class="btn btn-primary" type="submit">Toevoegen </button>
            </div>
        </form>
    </div>
<?php
include '../includes/footer.php';
?>