<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 11:51 AM
 */
include "functionsconnection.php";

$email = $_POST['email'];
$voornaam = $_POST['vnaam'];
$achternaam = $_POST['anaam'];
$wachtwoord1 = $_POST['wachtwoord'];
$wachtwoord2 = $_POST['wachtwoord2'];
$telefoonnummer = $_POST['telefoon'];
$IBAN = $_POST['iban'];
$postcode = $_POST['postcode'];
$huisnummer = $_POST['huisnummer'];
$straatnaam = $_POST['straat'];
$woonplaats = $_POST['woonplaats'];
$userlevel = $_POST['userlevel'];

$db->setUser($email, $voornaam, $achternaam, $wachtwoord1, $wachtwoord2, $telefoonnummer, $IBAN, $postcode, $huisnummer, $straatnaam, $woonplaats, $userlevel);