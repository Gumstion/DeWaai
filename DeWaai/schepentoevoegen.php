<?php
/**
 * Created by PhpStorm.
 * User: Gerrit A. Wieberdink
 * Date: 31-1-2017
 * Time: 13:21
 */?>
<?php
include 'includes/header.php';
?>
<!--Formulier schepen toevoegen-->
<div class="contact-clean">
    <form action="functions/schepen.php" method="post">
        <h2 class="text-center">Schip toevoegen </h2>
        <div class="form-group">
            <input class="form-control" type="number" name="schip_id" required="" placeholder="Nummer">
            <input class="form-control" type="text" name="naam" required="" placeholder="Naam">
            <input class="form-control" type="number" name="plaatsen" required="" placeholder="Aantal plaatsen">
            <input class="form-control" type="text" name="ontwerp" required="" placeholder="Ontwerp">
            <select name="cursus">
                <option value="1">Beginners</option>
                <option value="2">Gevorderde</option>
                <option value="3">Wadtochten</option>
            </select><br><br>
            <input type="radio" name="averij" value="1"> Averij<br>
            <input type="radio" name="averij" value="0" checked="checked"> Geen averij<br>
            <button class="btn btn-primary" type="submit">Toevoegen </button>
        </div>
    </form>
</div>
<?php
include 'includes/footer.php';
?>

