<?php

//DATABASE LOCAL
try {

    $user = "root";
    $pass = "";
    $db = new PDO('mysql:host=localhost;dbname=adiabc_db', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
//DATABASE WEBSITE
// try {

//     $user = "root";
//     $pass = "";
//     $db = new PDO('mysql:host=localhost;dbname=adiabc_db', $user, $pass);
//     echo "CONECTADO";
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }



?>