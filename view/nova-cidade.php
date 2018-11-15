<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastrar nova cidade!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php 
set_include_path("../control/");
include("navbar.php");
require("database.php");?>
    <div class="container mt-3">
        <form action="../control/new-city.php" method="POST">
            <div class="form-group">
                <label for="name">Nome da Cidade:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" name="state" id="state">
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-primary mb-3">
        </form>
    </div>
    
</body>
</html>