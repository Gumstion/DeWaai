<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 11:51 AM
 */
include "connection.php";

$begindatum = $_POST['bdatum'];
$einddatum = $_POST['edatum'];
$aantal = $_POST['aantal'];
$soort_id = $_POST['cursus'];

$db->setReservering($begindatum, $einddatum, $aantal, $soort_id);
$db->setCursist();
