<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>

<?php 
    set_include_path("../control/");
    include("navbar.php");
    require("database.php");

    if(!isset($_GET["id"])){
        echo "Não foi possível carregar as informações!";
        return;
    }
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    
    $searchUser = $db->query("SELECT * FROM `user` WHERE `id`='".$id."'");
    if($row = $searchUser->fetch()){
        $name = $row["nome"];
        $email = $row["email"];
        $sex = $row["sexo"];
        $adress = $row["endereco"];
        $postal = $row["cep"];
        $cityID = $row["cidade"];
        $born = $row["born"];
        $cellphone = $row["celular"];
        $homecell = $row["residencial"];
        $dad = $row["pai"];
        $mom = $row["mae"];
        $dtype = $row["tipo_diabetes"];
        $trat = $row["tratamento"];
        $redes = [
            "twitter" => $row["twitter"],
            "facebook" => $row["facebook"],
            "instagram" => $row["instagram"],
        ];
        $ob = $row["obs"];
    }
?>



<form action="../control/edit-user.php" method="POST">
        Nome: <input type="text" name="name" value="<?php echo $name; ?>"><br>
        E-mail: <input type="email" name="email" value="<?php echo $email; ?>"><br>
        Endereço: <input type="text" name="adress" value="<?php echo $adress; ?>"><br>
        CEP: <input type="text" name="postal" value="<?php echo $postal; ?>"><br>
        Cidade: <select name="city">
        <?php
            $getCitys = $db->query("SELECT * FROM `city`");
            $qnt = 0;
            while($row = $getCitys->fetch()){
                $qnt++;
                $cityname = $row["name"];
                if($row["id"] == $cityID){
                    ?>
                    <option value="<?php echo $cityname;?>" selected><?php echo $cityname;?></option>
         <?php }else{
          ?>
               <option value="<?php echo $cityname;?>"><?php echo $cityname;?></option>
            <?php }
            }
        ?>
        </select><br>
        Data de nascimento: <input type="date" name="born" value="<?php echo $born; ?>"><br>
        Sexo: <select name="sexo">
                <?php 
                    if($sex == "masc"){
                        echo '<option value="masc" selected>Masculino</option>';
                        echo '<option value="fem">Feminino</option>';
                        echo '<option value="outro">Outro</option>';
                    }else if($sex == "fem"){
                        echo '<option value="masc">Masculino</option>';
                        echo '<option value="fem" selected>Feminino</option>';
                        echo '<option value="outro">Outro</option>';
                    }else{
                        echo '<option value="masc">Masculino</option>';
                        echo '<option value="fem">Feminino</option>';
                        echo '<option value="outro" selected>Outro</option>';
                    }
                ?>
        </select><br>
        Celular: <input type="text" name="cellphone" value="<?php echo $cellphone; ?>"><br>
        Telefone Residencial: <input type="text" name="home-cell" value="<?php echo $homecell; ?>"><br>
        Nome da mãe: <input type="text" name="mother" value="<?php echo $mom; ?>"><br>
        Nome da pai: <input type="text" name="dad" value="<?php echo $dad; ?>"><br>
        Tipo de diabetes: <select name="type">
            <?php 
                if($dtype == "1"){
                    echo '<option value="type-1" selected>Tipo 1</option>';
                    echo '<option value="type-2">Tipo 2</option>';
                }else{
                    echo '<option value="type-1">Tipo 1</option>';
                    echo '<option value="type-2" selected>Tipo 2</option>';
                }
            
            ?>
        </select><br>
        Tratamento: <select name="treatment">
            <?php 
                    if($trat == "insulina"){
                        echo '<option value="insulina" selected>Insulina</option>';
                        echo '<option value="bomba">Bomba</option>';
                        echo '<option value="Medicamento">Medicamento</option>';
                    }else if($trat == "bomba"){
                        echo '<option value="insulina">Insulina</option>';
                        echo '<option value="bomba" selected>Bomba</option>';
                        echo '<option value="Medicamento">Medicamento</option>';
                    }else{
                        echo '<option value="insulina">Insulina</option>';
                        echo '<option value="bomba" selected>Bomba</option>';
                        echo '<option value="Medicamento">Medicamento</option>';
                    }
                ?>
        </select><br>
        Twitter: <input type="text" name="twitter" value="<?php echo $redes["twitter"]; ?>"><br>
        Instagram: <input type="text" name="instagram" value="<?php echo $redes["instagram"]; ?>"><br>
        Facebook: <input type="text" name="facebook" value="<?php echo $redes["facebook"]; ?>"><br><br>
        <textarea name="obs"><?php echo $ob; ?></textarea><br>
</form>
    
</body>
</html>