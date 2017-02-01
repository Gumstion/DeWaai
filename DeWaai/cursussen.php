<?php
include 'includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="assets/images/16kwadraat.jpg" alt="">
                <div class="caption">
                    <?php
                        $db->getSoortCursus(1);
                    ?>
                </div>
                <form action="reserveringen.php" method="post">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Reserveren </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="assets/images/draak.jpg" alt="">
                <div class="caption">
                    <?php
                        $db->getSoortCursus(2);
                    ?>
                </div>
                <form action="reserveringen.php" method="post">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Reserveren </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="assets/images/schouw.jpg" alt="">
                <div class="caption">
                    <?php
                        $db->getSoortCursus(3);
                    ?>
                </div>
                <form action="reserveringen.php" method="post">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Reserveren </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>

