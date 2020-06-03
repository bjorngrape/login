<?php

include("db.php");

$createUsername = $_POST['create_username'];
$createPassword = md5($_POST['create_password']);


$query = "INSERT INTO users (username, password) VALUES('$createUsername', '$createPassword');";
//exec returner bara om det är sant eller falskt
$return = $dbh->exec($query);

header("location:index.php");

?>