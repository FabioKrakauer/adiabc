<?php 
require("database.php");
if(!isset($_POST)){
    echo "Não foi possivel receber nenhum dado de usuario!";
    return;
}
$id = $_POST["id"];
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
$twitter = isset($_POST["twitter"]) ? $_POST["twitter"] : "NULO";
$instagram = isset($_POST["instagram"]) ? $_POST["instagram"] : "NULO";
$facebook = isset($_POST["facebook"]) ? $_POST["facebook"] : "NULO";
$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "NULO";
$obs = isset($_POST["obs"]) ? $_POST["obs"] : "NULO";

$cityID = 0;
$searchCity = $db->query("SELECT `id` FROM `city` WHERE `name`='$city'");
if($row = $searchCity->fetch()){
    $cityID = $row["id"];
}
$tipo = 0;
if($type == "type-1"){
    $tipo = 1;
}else{
    $tipo = 2;
}
$updateQuery = "UPDATE `user` SET `nome`='$name', `email`='$email', `sexo`='$sexo',`endereco`='$adress',`cep`='$postal', `cidade`='$cityID', `born`='$born', `celular`='$cellphone', `residencial`='$homecell', `pai`='$dad', `mae`='$mother',`tipo_diabetes`='$tipo', `tratamento`='$treatment', `twitter`='$twitter', `instagram`='$instagram', `facebook`='$facebook', `obs`='$obs' WHERE `id`='$id'";
$deleteQuery = "DELETE FROM `user` WHERE `id`='$id'";

if($_POST["action"] == "Excluir"){
    $delUser = $db->query($deleteQuery);
    echo "Usuario deletado!";
}else{
    $updateUser = $db->query($updateQuery);
    echo "Informacoes salvas com sucesso!";
}
?>