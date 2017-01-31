<?php

/**
 * Created by PhpStorm.
 * User: Lau
 * Date: 1/31/2017
 * Time: 9:23 AM
 */
class db {
    private $conn;
    private $servername;
    private $dbuser;
    private $dbpass;
    private $dbname;

    function setDB($servername, $dbuser, $dbpass, $dbname) {
        $this->servername = $servername;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
    }

    function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully" . "<br/>";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function setUser($email, $voornaam, $achternaam, $wachtwoord, $wachtwoord2, $telefoonnummer, $IBAN, $postcode, $huisnummer, $straatnaam, $woonplaats, $userlevel) {
        if(!empty($email) || !empty($achternaam) || !empty($wachtwoord) || !empty($telefoonnummer) || !empty($IBAN) || !empty($postcode) || !empty($huisnummer)) {
            if($wachtwoord != $wachtwoord2) {
                echo "Uw wachtwoord komt niet overeen!";
            } else {
                $getpostcode = "SELECT postcode FROM adres WHERE postcode=?";
                $preppostcode = $this->conn->prepare($getpostcode);
                $preppostcode->execute([$postcode]);
                $count = $preppostcode->rowCount();
                if($count == 0) {
                    $postcode = htmlspecialchars($postcode);
                    $straatnaam = htmlspecialchars($straatnaam);
                    $woonplaats = htmlspecialchars($woonplaats);

                    $sqladres = "INSERT INTO adres (postcode, straatnaam, woonplaats) VALUES (?,?,?)";
                    $prepadres = $this->conn->prepare($sqladres);
                    $prepadres->execute([$postcode, $straatnaam, $woonplaats]);
                    echo "succes";
                } else {
                    echo "postcode bestaat al";
                }
                //speciale characters worden onthoud door de numerieke code
                $email = htmlspecialchars($email);
                $voornaam = htmlspecialchars($voornaam);
                $achternaam = htmlspecialchars($achternaam);
                $wachtwoord = htmlspecialchars($postcode);

                //wachtwoord encrypten
                $options = ['cost' => 12,];
                $encryptpass = password_hash($wachtwoord, PASSWORD_BCRYPT, $options);
                echo $encryptpass;

                $sqluser = "INSERT INTO user (email, voornaam, achternaam, wachtwoord, telefoonnummer, IBAN, postcode, huisnummer, userlevel) VALUES (?,?,?,?,?,?,?,?,?)";
                $prepuser = $this->conn->prepare($sqluser);
                $prepuser->execute([$email, $voornaam, $achternaam, $encryptpass, $telefoonnummer, $IBAN, $postcode, $huisnummer, $userlevel]);
            }
        }

    }

    function checkUser($email, $wachtwoord) {
        session_start();
        if (!empty($email) || !empty($wachtwoord) ) {

            //wachtwoord uit de database halen
            $sqlpass = "SELECT wachtwoord FROM user WHERE email=?";
            $preppass = $this->conn->prepare($sqlpass);
            $preppass->execute([$email]);
            $result = $preppass->fetch(PDO::FETCH_ASSOC);
            $hash = $result['wachtwoord'];

            //kijken of het encrypted wachtwoord overeen komt met het wachtwoord in de database
            if(password_verify($wachtwoord, $hash)) {
                echo "wachtwoord is juist!";
                header("Location: ../mijnreserveringen.php");
            } else {
                echo "password komt niet overeen!";


//                $getpostcode = "SELECT postcode FROM adres WHERE postcode=?";
//                $preppostcode = $this->conn->prepare($getpostcode);
//                $preppostcode->execute([$postcode]);
//                $count = $preppostcode->rowCount();
//                if ($count == 0) {
//                    $postcode = htmlspecialchars($postcode);
//                    $straatnaam = htmlspecialchars($straatnaam);
//                    $woonplaats = htmlspecialchars($woonplaats);
//
//                    $sqladres = "INSERT INTO adres (postcode, straatnaam, woonplaats) VALUES (?,?,?)";
//                    $prepadres = $this->conn->prepare($sqladres);
//                    $prepadres->execute([$postcode, $straatnaam, $woonplaats]);
//                    echo "succes";
//                } else {
//                    echo "postcode bestaat al";
//                }
//                //speciale characters worden onthoud door de numerieke code
//                $email = htmlspecialchars($email);
//                $voornaam = htmlspecialchars($voornaam);
//                $achternaam = htmlspecialchars($achternaam);
//                $wachtwoord = htmlspecialchars($postcode);
//
//                //wachtwoord encrypten
//                $options = ['cost' => 12,];
//                $encryptPass = password_hash($wachtwoord, PASSWORD_BCRYPT, $options);
//                echo $encryptPass;
//
//                $sqluser = "INSERT INTO user (email, voornaam, achternaam, wachtwoord, telefoonnummer, IBAN, postcode, huisnummer, userlevel) VALUES (?,?,?,?,?,?,?,?,?)";
//                $prepuser = $this->conn->prepare($sqluser);
//                $prepuser->execute([$email, $voornaam, $achternaam, $encryptPass, $telefoonnummer, $IBAN, $postcode, $huisnummer, $userlevel]);
            }
        }
    }
}