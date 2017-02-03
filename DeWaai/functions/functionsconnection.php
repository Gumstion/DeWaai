<?php
session_start();
include "../classes/db.php";

$db = new db();
$db->setDB("localhost", "dewaai", "dewaai", "groep4");
$db->connect();