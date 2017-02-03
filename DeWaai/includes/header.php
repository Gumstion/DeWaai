<!DOCTYPE html>
<html>

<?php
    include 'head.php';
?>

<body>
<div>

<?php
include "functions/connection.php";
//kijken of de gebruiker is ingelogd
if(!empty($_SESSION['logged']) && $_SESSION['logged'] == 1) {
    //admin
    if($_SESSION['userlevel'] == 1) {
        include 'includes/adminmenu.php';
    //medewerker
    } elseif ($_SESSION['userlevel'] == 2) {
        include 'includes/medewerkermenu.php';
    //cursist
    } else {
        include 'includes/cursistmenu.php';
    }
} else {
    include 'includes/menu.php';
}
?>

</div>