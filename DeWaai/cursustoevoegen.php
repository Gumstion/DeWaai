<?php
/**
 * Created by PhpStorm.
 * User: Gerrit A. Wieberdink
 * Date: 31-1-2017
 * Time: 13:35
 */?>
<?php
include 'includes/header.php';
?>
    <!--Formulier cursus toevoegen-->
    <div class="contact-clean">
        <form action="functions/cursus.php" method="post">
            <h2 class="text-center">Cursus toevoegen </h2>
            <div class="form-group">
                Cursussoort:<br>
                <input class="form-control" type="text" name="cursussoort" required="" >
                Prijs:<br>
                <input class="form-control" type="number" name="prijs" required="" >
                Omschrijving:<br>
                <input class="form-control" type="text" name="omschrijving" required="" >
                Schip ontwerp:<br>
                <input class="form-control" type="text" name="ontwerp" required="" >
                <br/>
                <button class="btn btn-primary" type="submit">Toevoegen </button>
            </div>
        </form>
    </div>
<?php
include 'includes/footer.php';
?>