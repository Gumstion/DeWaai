<?php
include "connection.php";

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];


$db->checkUser($email, $wachtwoord);

$db->getCursus();