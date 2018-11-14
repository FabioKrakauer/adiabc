<?php
if($_POST == null){
    echo "Erro ao cadastrar novos usuarios! <a href='/adiabc/view/novo-usuario.php>Clique aqui para voltar</a>'";
    return;
}
require("database.php");

$name = $_POST['name'] ? $_POST["name"] : "NULO";
$email = $_POST['email'] ? $_POST["email"] : "NULO";
$adress = $_POST['adress'] ? $_POST["adress"] : "NULO";
$postal = $_POST['postal'] ? $_POST["postal"] : "NULO";
$city = $_POST['city'] ? $_POST["city"] : "NULO";
$born = $_POST['born'] ? $_POST["born"] : "NULO";
$cellphone = $_POST['cellphone'] ? $_POST["cellphone"] : "NULO";
$homecell = $_POST['home-cell'] ? $_POST["home-cell"] : "NULO";
$mother = $_POST['mother'] ? $_POST["mother"] : "NULO";
$dad = $_POST['dad'] ? $_POST["dad"] : "NULO";
$type = $_POST['type'] ? $_POST["type"] : "NULO";
$treatment = $_POST['treatment'] ? $_POST["treatment"] : "NULO";
$redes = [
    "twitter" => $_POST["twitter"] ? $_POST["twitter"] : "NULO",
    "instagram" => $_POST["instagram"] ? $_POST["instagram"] : "NULO",
    "facebook" => $_POST["facebook"] ? $_POST["facebook"] : "NULO",
];
$obs = $_POST["obs"];

$tipo = 0;
if($type == "type-1"){
    $tipo = 1;
}else{
    $tipo = 2;
}
$cityID = 0;
$searchCity = $db->query("SELECT `id` FROM `city` WHERE `name`='$city'");
if($row = $searchCity->fetch()){
    $cityID = $row["id"];
}

$insert = "INSERT INTO `user` (`id`, `nome`, `email`, `endereco`, `cep`, `cidade`, `born`, `celular`, `residencial`, `pai`, `mae`, `tipo_diabetes`, `tratamento`, `twitter`, `facebook`, `instagram`, `obs`) VALUES (NULL, '$name', '$email', '$adress', '$postal', '$cityID', '$born', '$cellphone', '$homecell', '$dad', '$mother', '$tipo', '$treatment', '".$redes["twitter"]."', '".$redes["facebook"]."', '".$redes["instagram"]."', '$obs')";
$insertQuery = $db->prepare($insert);
$insertQuery->execute();
echo "Usuario inserido com sucesso!";

?>