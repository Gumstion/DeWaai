<?php
include 'includes/header.php';

?>
<div class="container">
    <div class="row">
        <div class="post-body">
            <?php
            $db->getAllCursus();
            ?>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>

