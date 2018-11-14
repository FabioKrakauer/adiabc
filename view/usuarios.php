<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<?php 
set_include_path("../control/");
include("navbar.php");
require("database.php");?>
<body>
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
     $selectAll = $db->query("SELECT * FROM `user`");
    while($row = $selectAll->fetch()){
        $nome = $row["nome"];
        $email = $row["email"];
        $adress = $row["endereco"];
        $build = $row["born"];
        $cityID = $row["cidade"];
        $getCityName = "SELECT `name` FROM `city` WHERE `id`='".$cityID."'";
        $getCityNameQuery = $db->query($getCityName);
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
            <td><a href="#ecluir">Excluir</a> | <a href="#modificar">Modificar</a> | <a href="#ver">Ver detalhes</a></td>
        </tr>
    <?php }
?> 
    
    </table>
    
</body>
</html>