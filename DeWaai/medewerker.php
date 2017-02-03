<?php
include 'includes/header.php';

?>
<div class="container">
    <div class="row">
        <div class="post-body">
            <?php
            $db->getAllMedewerkers();
            ?>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>

