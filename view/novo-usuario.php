
<!DOCTYPE html>
<html>
<head>
    <?php header("Content-Type: text/html; charset=ISO-8859-1",true);?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criar usuario</title>
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
        <form action="/adiabc/control/new-user.php" method="POST" class="form-row">
    
            <div class="form-group col-12">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome">
            </div>
            <div class="form-group col-12">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite o email">
            </div>
            <div class="form-group col-12">
                <label for="address">Endereço:</label>
                <input type="text" class="form-control" name="adress" id="address" placeholder="Digite o endereco">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" name="postal" id="cep" placeholder="Digite o CEP">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="city">Cidade:</label>
                <select class="form-control" name="city" id="city">
                <?php
                    $getCitys = $db->query("SELECT `name` FROM `city`");
                    $qnt = 0;
                    while($row = $getCitys->fetch()){
                        $qnt++;
                        $cityname = $row["name"];
                       ?>
                       <option value="<?php echo $cityname;?>"><?php echo $cityname;?></option>
                    <?php }
                ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="born">Data de nascimento:</label>
                <input type="date" class="form-control" name="born" id="born" placeholder="Digite a data de nascimento">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="sexo">Sexo:</label>
                <select  class="form-control" name="sexo" id="sexo">
                    <option value="masc">Masculino</option>
                    <option value="fem">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="cellphone">Celular:</label>
                <input type="text" class="form-control" name="cellphone" id="cellphone" placeholder="Digite o Celular">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="home-cell">Telefone Residencial:</label>
                <input type="text" class="form-control" name="home-cell" id="home-cell" placeholder="Digite o telefone residencial">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="mother">Nome da mãe:</label>
                <input type="text" class="form-control" name="mother" id="mother" placeholder="Digite o nome da mae">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="dad">Nome do pai:</label>
                <input type="text" class="form-control" name="dad" id="dad" placeholder="Digite o nome do pai">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="type">Tipo de diabetes:</label>
                <select class="form-control" name="type" id="type">
                    <option value="type-1">Tipo 1</option>
                    <option value="type-2">Tipo 2</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="treatment">Tratamento:</label>
                <select class="form-control" name="treatment" id="treatment">
                    <option value="insulina">Insulina</option>
                    <option value="bomba">Bomba</option>
                    <option value="Medicamento">Medicamento</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="twitter">Twitter:</label>
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Digite o twitter">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="instagram">Instagram:</label>
                <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Digite o instagram">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Digite o facebook">
            </div>
            <div class="form-group col-12">
                <label for="obs">Observações:</label>
                <textarea name="obs" class="form-control" id="obs" cols="30" rows="10" placeholder="Digite as observacoes!"></textarea>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary mb-3">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>