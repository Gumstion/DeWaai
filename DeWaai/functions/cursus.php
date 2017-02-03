<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 11:51 AM
 */
include "functionsconnection.php";

$cursussoort = $_POST['cursussoort'];
$prijs = $_POST['prijs'];
$omschrijving = $_POST['omschrijving'];
$ontwerp = $_POST['ontwerp'];

$db->setSoortCursus($cursussoort, $prijs, $omschrijving, $ontwerp);
