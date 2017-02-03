<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 11:51 AM
 */
include "functionsconnection.php";

$schip_id = $_POST['schip_id'];
$naam = $_POST['naam'];
$plaatsen = $_POST['plaatsen'];
$soort_id = $_POST['cursus'];
$averij = $_POST['averij'];

$db->setSchip($schip_id, $naam, $plaatsen, $averij, $soort_id);
