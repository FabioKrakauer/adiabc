<?php
require("database.php");

if($_POST == null){
    echo "Não recebemos os dados necessarios!";
    return;
}

$cityName = $_POST["name"] ? $_POST["name"] : "NULO";
if($cityName == "NULO"){
    echo "Nome invalido!";
    return;
}
$exists = "SELECT `name` FROM `city` WHERE `name`='".$cityName."'";
$existQuery = $db->query($exists);
if($row = $existQuery->fetch()){
    echo "Já achamos uma cidade com este nome!";
    return;
}
$insert = "INSERT INTO `city` (`id`, `name`) VALUES (NULL, '$cityName')";
$insetQuery = $db->prepare($insert);
$insetQuery->execute();
echo "Cidade cadastrada!";

?>