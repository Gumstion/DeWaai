<?php
include 'includes/header.php';
?>
    <!--Contactformulier-->
    <div class="contact-clean">
        <form action="" method="post">
            <h2 class="text-center">Contact </h2>
            <div class="form-group">
                <input class="form-control" type="text" name="naam" required="" placeholder="Je naam">
                <input class="form-control" type="email" name="email" required="" placeholder="Email">
                <input class="form-control" type="number" name="telefoon" placeholder="Telefoon">
                <input class="form-control" type="text" name="woonplaats" placeholder="Woonplaats">
                <textarea class="form-control" type="text"name="bericht" required="" placeholder="Je bericht" rows="5"></textarea>
                <button class="btn btn-primary" type="submit">Versturen </button>
            </div>
        </form>
    </div>
<?php
include 'includes/footer.php';
?>
