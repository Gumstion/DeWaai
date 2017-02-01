<?php
/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 2/1/2017
 * Time: 9:15 AM
 */
session_start();
if($_SESSION['logged'] != 0) {
    header("Location: ../reserveren.php");
} else {
    header("Location: ../login.php");
}