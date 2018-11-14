<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Pesquisar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>

<?php 
set_include_path("../control/");
include("navbar.php");
require("database.php");?>

<form action="pesquisar.php?s=1" method="POST">
    Principal filtro: <select name="filtro">
        <option value="nome">Nome</option>
        <option value="email">Email</option>
        <option value="tipo">Tipo de diabetes</option>
        <option value="sexo">Sexo</option>
        <option value="city">Cidade</option>
    </select>
    <input type="text" name="name" placeholder="Digite um nome">
    <input type="email" name="email" placeholder="Digite o email">

    <select name="d_type">
        <option value="null">Selecione um tipo</option>
        <option value="1">1</option>
        <option value="2">2</option>
    </select>

    <select name="sexo">
        <option value="null">Selecione um sexo</option>
        <option value="masc">Masculino</option>
        <option value="fem">Feminino</option>
        <option value="outro">Outro</option>
    </select>

    <select name="city">
        <option value="null">Selecione uma cidade</option>
        <?php
        header('Content-Type: text/html; charset=utf-8');
            $getCitys = $db->query("SELECT `name` FROM `city`");
            $qnt = 0;
            while($row = $getCitys->fetch()){
                $qnt++;
                $cityname = $row["name"];
               ?>
               <option value="<?php echo $cityname;?>"><?php echo $cityname;?></option>
            <?php }
        ?>

    <input type="submit" value="Procurar">

    <?php 
        if(!isset($_GET["s"])){

        }else{
            $query = "SELECT * FROM `user` WHERE";
            $nome = isset($_POST["name"]) ? $_POST["name"] : "null";
            $email = isset($_POST["email"]) ? $_POST["email"] : "null";
            $dtype = isset($_POST["d_type"]) ? $_POST["d_type"] : "null";
            $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "null";
            $city = isset($_POST["city"]) ? $_POST["city"] : "null";
            $filtro = $_POST["filtro"];

            $cityID = 0;
            $citySearch = $db->query("SELECT `id` FROM `city` WHERE `name`='".$city."'");
            if($row = $citySearch->fetch()){
                $cityID = $row["id"];
            }
            if($filtro == "nome"){
                $query .= " `nome`='".$nome."'";
            }else if($filtro == "email"){
                $query .= " `email`='".$email."'";
            }else if($filtro == "tipo"){
                $query .= " `tipo_diabetes`='".$dtype."'";
            }else if($filtro == "sexo"){
                $query .= " `sexo`='".$sexo."'";
            }else if($filtro == "city"){
                $query .= " `cidade`='".$cityID."'";
            }

            if($nome != ""){
                $query .= " AND `nome`='".$nome."'";
            }
            if($email != ""){
                $query .= " AND `email`='".$email."'";
            }
            if($dtype != "null"){
                $query .= " AND `tipo_diabetes`='".$dtype."'";
            }
            if($sexo != "null"){
                $query .= " AND `sexo`='".$sexo."'";
            }
            if($city != "null"){
                $query .= " AND `cidade`='".$cityID."'";
            }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Endereço</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Acao</th>
            </tr>
        </thead>
        <?php
            $selectAll = $db->query($query);
            while($row = $selectAll->fetch()){
                $id = $row["id"];
                $nome = $row["nome"];
                $email = $row["email"];
                $adress = $row["endereco"];
                $build = $row["born"];
                $cityID = $row["cidade"];
                $getCityName = "SELECT `name` FROM `city` WHERE `id`='".$cityID."'";
                $getCityNameQuery = $db->query($getCityName);
                $cityName = "Não encontrado!";
                if($citys = $getCityNameQuery->fetch()){
                    $cityName = $citys["name"];
                }
                $born = date("d/m/Y", strtotime($build));
        ?>
        <tr>
            <td><?php echo $nome; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $adress; ?></td>
            <td><?php echo $born; ?></td>
            <td><?php echo $cityName; ?></td>
            <td><a href="user-profile.php?action=edit&id=<?php echo $id; ?>">Excluir</a> | <a href="user-profile.php?action=modify&id=<?php echo $id; ?>">Modificar</a> | <a href="user-profile.php?action=details&id=<?php echo $id; ?>">Ver detalhes</a></td>
        </tr>
    <?php }
?> 
    
    </table>
</form>
        <?php } ?>
</body>
</html>