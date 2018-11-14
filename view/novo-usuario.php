
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
    <form action="/adiabc/control/new-user.php" method="POST" class="mt-10">
        Nome: <input type="text" name="name" placeholder="Digite o nome" required><br>
        E-mail: <input type="email" name="email" placeholder="Digite o email"><br>
        Endereço: <input type="text" name="adress" placeholder="Digite o endereco" required><br>
        CEP: <input type="text" name="postal" placeholder="Digite o CEP" required><br>
        Cidade: <select name="city">
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
        </select><br>
        Data de nascimento: <input type="text" name="born" placeholder="Digite a data de nascimento" required><br>
        Celular: <input type="text" name="cellphone" placeholder="Digite o Celular"><br>
        Telefone Residencial: <input type="text" name="home-cell" placeholder="Digite o telefone residencial"><br>
        Nome da mãe: <input type="text" name="mother" placeholder="Digite o nome da mae"><br>
        Nome da pai: <input type="text" name="dad" placeholder="Digite o nome do pai"><br>
        Tipo de diabetes: <select name="type">
            <option value="type-1">Tipo 1</option>]
            <option value="type-2">Tipo 2</option>
        </select><br>
        Tratamento: <select name="treatment">
            <option value="insulina">Insulina</option>
            <option value="bomba">Bomba</option>
            <option value="Medicamento">Medicamento</option>
        </select><br>
        Twitter: <input type="text" name="twitter" placeholder="Digite o twitter"><br>
        Instagram: <input type="text" name="instagram" placeholder="Digite o instagram"><br>
        Facebook: <input type="text" name="facebook" placeholder="Digite o facebook"><br><br>
        <textarea name="obs" cols="30" rows="10" placeholder="Digite as observacoes!"></textarea><br>
        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>