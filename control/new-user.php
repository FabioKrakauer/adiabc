<?php
if($_POST == null){
    echo "Erro ao cadastrar novos usuarios! <a href='/adiabc/view/novo-usuario.php>Clique aqui para voltar</a>'";
    return;
}
require("database.php");

$name = isset($_POST['name']) ? $_POST["name"] : "NULO";
$email = isset($_POST['email']) ? $_POST["email"] : "NULO";
$adress = isset($_POST['adress']) ? $_POST["adress"] : "NULO";
$postal = isset($_POST['postal']) ? $_POST["postal"] : "NULO";
$city = isset($_POST['city']) ? $_POST["city"] : "NULO";
$born = isset($_POST['born']) ? $_POST["born"] : "NULO";
$cellphone = isset($_POST['cellphone']) ? $_POST["cellphone"] : "NULO";
$homecell = isset($_POST['home-cell']) ? $_POST["home-cell"] : "NULO";
$mother = isset($_POST['mother']) ? $_POST["mother"] : "NULO";
$dad = isset($_POST['dad']) ? $_POST["dad"] : "NULO";
$type = isset($_POST['type']) ? $_POST["type"] : "NULO";
$treatment = isset($_POST['treatment']) ? $_POST["treatment"] : "NULO";
$redes = [
    "twitter" => isset($_POST["twitter"]) ? $_POST["twitter"] : "NULO",
    "instagram" => isset($_POST["instagram"]) ? $_POST["instagram"] : "NULO",
    "facebook" => isset($_POST["facebook"]) ? $_POST["facebook"] : "NULO",
];
$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "NULO";
$obs = isset($_POST["obs"]) ? $_POST["obs"] : "NULO";

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

$insert = "INSERT INTO `user` (`id`, `nome`, `email`,`sexo`, `endereco`, `cep`, `cidade`, `born`, `celular`, `residencial`, `pai`, `mae`, `tipo_diabetes`, `tratamento`, `twitter`, `facebook`, `instagram`, `obs`) VALUES (NULL, '$name', '$email','$sexo', '$adress', '$postal', '$cityID', '$born', '$cellphone', '$homecell', '$dad', '$mother', '$tipo', '$treatment', '".$redes["twitter"]."', '".$redes["facebook"]."', '".$redes["instagram"]."', '$obs')";
$insertQuery = $db->prepare($insert);
$insertQuery->execute();
echo "Usuario inserido com sucesso!";

?>