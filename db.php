<!-- SPARA!
Skriver ut felmeddelande för databasen
    
    if (!$return) {
        print_r($dbh->errorInfo());
    }
-->

<?php

// PHP settings och variabel-setup

$host = "localhost";
$user = "root";
$pass = "";
$db = "guestbook";


//try och catch är för att kunna fånga errors och visa dem som meddlanden istället för att sidan kraschar totalt.
//try är som det låter, man testar nått.
//om det skiter fångar catch upp det med ett felmeddelande.

// skapa anslutning

try {
    $dsn = "mysql:host=$host;dbname=$db;";
    $dbh = new PDO($dsn, $user, $pass);
    }
catch(PDOException $e)
    {
    // vid error
    echo "Error! $e->getMessage() <br />";
    die();
    }

?>