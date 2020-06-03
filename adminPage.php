<?php

session_start();
    if ($_SESSION ['role'] != "admin") {
        echo "<h2>Du är inte admin din lurifax!</h2>";
        die();
    }

?>

<h1>Den hemliga adminpanelen!</h1>