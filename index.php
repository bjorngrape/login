<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php
    session_start();
    echo (isset($_GET['err']) && $_GET['err'] == true ? "Hoppsan! Något gick snett" : "");
    echo (isset($_SESSION['username']) ? "Välkommen " . $_SESSION['username'] : '');


// rensa sessionen / cookies med logout.php

    if (isset($_SESSION['username'])) {

        if($_SESSION['role'] == "admin") {
            include("db.php");
            echo "<h1>Du är admin!</h1>";

            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username='$username'";
            $sth = $dbh->prepare($query);
            $return = $sth->execute();
            echo "<h1>Det finns ". $sth->rowCount() ." med användarnamnet $username</h1><br />";
        
            echo "<a href='adminPage.php'>Adminpanelen";
        }

        else {
            echo "<h1>Du är inte admin!</h1>";
        }
        
        echo "Hej " . $_SESSION['username'] . "!<br />";
        echo '<a href="logout.php">Logga ut!</a>';
    }

    else {
        include("loginForm.php");
        echo '<a href="signupForm.php">Register here!!</a>';
    }
?>

<!-- rensa sessionen/cookies. Överflödigt? 

<a href="index.php?clean=true">Logga ut</a> -->

<?php

//    if (isset($_GET['clean']) && $_GET['clean'] == true) {

//        session_destroy();
//        header("location:index.php");
//    } 

?> 

</body>
</html>