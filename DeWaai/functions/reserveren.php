<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 11:51 AM
 */
include "functionsconnection.php";

$weeknummer = $_POST['weeknummer'];
$aantal = $_POST['aantal'];
$soort_id = $_POST['cursus'];

$db->setReservering($weeknummer, $aantal, $soort_id);
/*$db->setCursist();*/
