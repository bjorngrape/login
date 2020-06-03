<?php

include("db.php");

$username = $_POST['username'];
// $password = $_POST['password'];
$password = md5($_POST['password']);

// query kollar om någon skrivit in rätt data och kan logga in 
$query = "SELECT id, username, password, role FROM users WHERE username='$username' AND password='$password'";

// query returnerar datan
$return = $dbh->query($query);

// hämta användarens info från databasen 
$row = $return->fetch(PDO::FETCH_ASSOC);

// om tomt skickas du tillbaka till startsidan
if (empty($row)) {
    
    header("location:index.php?err=true");

} else {

    // skapa en session med cookie för den sessionen
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['role']     = $row['role'];

    header('location:index.php');
}

//DET HÄR ÄR FÖR ATT LÄGGA TILL ANVÄNDARE I DATABASEN
/* $query = "INSERT INTO Users (Username, Password) VALUES('$postUsername', '$postPassword');";
//exec returner bara om det är sant eller falskt
$return = $dbh->exec($query); */

?>