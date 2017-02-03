<?php
session_start();
include "classes/db.php";

$db = new db();
$db->setDB("localhost", "root", "", "groep4");
$db->connect();