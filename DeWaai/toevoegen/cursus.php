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
        <form action="" method="post">
            <h2 class="text-center">Cursus toevoegen </h2>
            <div class="form-group">
                Begindatum:<br>
                <input class="form-control" type="date" name="bdatum" required="" >
                Einddatum:<br>
                <input class="form-control" type="date" name="edatum" required="" >
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