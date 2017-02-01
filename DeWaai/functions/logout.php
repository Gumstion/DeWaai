<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 10:42 PM
 */
session_start();

$_SESSION['logged'] = 0;

header("location: ../login.php");