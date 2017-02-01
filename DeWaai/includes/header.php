<!DOCTYPE html>
<html>

<?php
    include 'head.php';
?>

<body>
<div>

<?php
include "functions/connection.php";
if($_SESSION['logged'] == 1) {
    include 'includes/logout.php';

} else {
    include 'includes/menu.php';
}
?>

</div>