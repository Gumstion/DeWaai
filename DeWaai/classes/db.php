<?php
//!important! we moeten overal nog comments bij plaatsen
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

    function setUser($email, $voornaam, $achternaam, $wachtwoord1, $wachtwoord2, $telefoonnummer, $IBAN, $postcode, $huisnummer, $straatnaam, $woonplaats, $userlevel) {
        if(!empty($email) || !empty($achternaam) || !empty($wachtwoord) || !empty($telefoonnummer) || !empty($IBAN) || !empty($postcode) || !empty($huisnummer)) {
            if($wachtwoord1 != $wachtwoord2) {
                echo "Uw wachtwoord komt niet overeen!";
            } else {
                $getpostcode = "SELECT postcode FROM adres WHERE postcode = ?";
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
        if (!empty($email) || !empty($wachtwoord) ) {

            //wachtwoord uit de database halen
            $sqlpass = "SELECT user_id, voornaam, wachtwoord, userlevel FROM user WHERE email = ?";
            $preppass = $this->conn->prepare($sqlpass);
            $preppass->execute([$email]);
            $result = $preppass->fetch(PDO::FETCH_ASSOC);
            $hash = $result['wachtwoord'];

            //kijken of het encrypted wachtwoord overeen komt met het wachtwoord in de database
            if(password_verify($wachtwoord, $hash)) {
                $_SESSION['logged'] = 1;
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['userlevel'] = $result['userlevel'];
                $_SESSION['voornaam'] = $result['voornaam'];

                header("Location: ../dashboard.php");
            } else {
                $_SESSION['logged'] = 0;
                echo "email of password komen niet overeen!";
            }
        }
    }

    function setSchip($schip_id, $ontwerp, $naam, $plaatsen, $averij, $soort_id) {
        $sql = "INSERT INTO schip (schip_id, ontwerp, naam, plaatsen, averij, soort_id) VALUES (?,?,?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$schip_id, $ontwerp, $naam, $plaatsen, $averij, $soort_id]);
        echo "Schip succes";
    }

    function setReservering($begindatum, $einddatum, $aantal, $soort_id) {
        $sql = "INSERT INTO cursus (begindatum, einddatum, aantal, soort_id) VALUES (?,?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$begindatum, $einddatum, $aantal, $soort_id]);

        $sql = "SELECT cursus_id FROM cursus WHERE begindatum = ? AND einddatum = ? AND aantal = ? AND soort_id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$begindatum, $einddatum, $aantal, $soort_id]);
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        $_SESSION['cursus_id'] = $result['cursus_id'];
        echo $_SESSION['cursus_id'];
    }

    function setCursist() {
        $user_id = $_SESSION['user_id'];
        $cursus_id = $_SESSION['cursus_id'];
        $sql = "INSERT INTO cursistcursus (cursus_id, user_id) VALUES (?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$cursus_id, $user_id]);
        header("Location: ../dashboard.php");
    }

    function setSoortCursus($cursussoort, $prijs, $omschrijving) {
        $sql = "INSERT INTO soortcursus (cursussoort, prijs, beschrijving) VALUES (?,?,?)";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$cursussoort, $prijs, $omschrijving]);
        echo "SoortCursus succes";
    }

    function getSoortCursus($soort) {
        $sql = "SELECT cursussoort, prijs, beschrijving FROM soortcursus WHERE soort_id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$soort]);
        $result= $prep->fetch(PDO::FETCH_ASSOC);
        $prijs = $result['prijs'];
        $cursussoort = $result['cursussoort'];
        $beschrijving = $result['beschrijving'];
        echo "<h4 class=\"pull-right\">€$prijs,-</h4><br/>";
        echo "<h4><a href=\"#\">$cursussoort</a></h4>";
        echo "<p>$beschrijving</p>";
    }

    function getCursus() {
        $user_id = $_SESSION['user_id'];
        echo $user_id;
        $sql = "SELECT cursus_id FROM cursistcursus WHERE user_id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$user_id]);
        $result= $prep->fetch(PDO::FETCH_ASSOC);
        $cursus_id = $result['cursus_id'];

        $sql = "SELECT begindatum, einddatum, aantal, soort FROM cursus WHERE cursus_id = ?";
        $prep = $this->conn->prepare($sql);
        $prep->execute([$cursus_id]);
        $result= $prep->fetch(PDO::FETCH_ASSOC);

    }

    function getAllCursus() {
        $sql = "SELECT * FROM cursus";
        $sth = $this->conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT cursussoort FROM soortcursus WHERE soort_id = ?";
        $sth = $this->conn->prepare($sql);

        foreach ($result as $cursus){
            $soort_id = $cursus['soort_id'];
            $sth->execute([$soort_id]);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            echo "<li>Begindatum: " . $cursus['begindatum'] . "</li>
                  <li>Einddatum: " . $cursus['einddatum'] . "</li>
                  <li>Aantal personen: " . $cursus['aantal'] . "</li>
                  <li>Cursussoort: " . $result['cursussoort'] . "</li><br/>";

        }
    }

    function getAllSchepen() {
        $sql = "SELECT * FROM schip";
        $sth = $this->conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $schip){
            echo "<li>Schip_id: " . $schip['schip_id'] . "</li>
                  <li>Ontwerp: " . $schip['ontwerp'] . "</li>
                  <li>Naam: " . $schip['naam'] . "</li>
                  <li>Plaatsen: " . $schip['plaatsen'] . "</li>
                  <li>Averij: " . $schip['averij'] . "</li>
                  <li>Cursussoort: " . $schip['soort_id'] . "</li><br/>";
        }
    }
}