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
    <!--Formulier reserveren-->
    <div class="contact-clean">
        <form action="functions/reserveren.php" method="post">
            <h2 class="text-center">Cursus reserveren</h2>
            <?php
                if(!empty($_SESSION['cursus_is_vol'])) {
                    echo $_SESSION['cursus_is_vol'];
                }
            ?>
            <div class="form-group">
                Weeknummer:<br>
                <input class="form-control" type="number" name="weeknummer" required="" >
                Aantal personen:<br>
                <input class="form-control" type="number" name="aantal" required="" >
                <select name="cursus">
                    <option value="1">Beginners</option>
                    <option value="2">Gevorderde</option>
                    <option value="3">Wadtochten</option>
                </select><br>
                <button class="btn btn-primary" type="submit">Toevoegen </button>
            </div>
        </form>
    </div>
<?php
include 'includes/footer.php';
?>