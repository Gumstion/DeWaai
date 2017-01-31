<?php
include $_SERVER["DOCUMENT_ROOT"]."/my-site/DeWaai/DeWaai/classes/db.php";

$db = new db();
$db->setDB("localhost", "dewaai", "dewaai", "dewaai");
$db->connect();