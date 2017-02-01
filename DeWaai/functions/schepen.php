<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 11:51 AM
 */
include "connection.php";

$schip_id = $_POST['schip_id'];
$ontwerp = $_POST['ontwerp'];
$naam = $_POST['naam'];
$plaatsen = $_POST['plaatsen'];
$soort_id = $_POST['cursus'];
$averij = $_POST['averij'];

$db->setSchip($schip_id, $ontwerp, $naam, $plaatsen, $averij, $soort_id);
