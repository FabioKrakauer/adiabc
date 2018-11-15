<?php

//DATABASE LOCAL
try {

    $user = "root";
    $pass = "";
    $db = new PDO('mysql:host=localhost;dbname=adiabc_db', $user, $pass);
    header('Content-Type: text/html; charset=utf-8');
    $db->exec("set names utf8");

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
