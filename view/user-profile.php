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

    <div class="container mt-3">
        <form action="../control/edit-user.php" method="POST" class="form-row">

            <div class="form-group col-12">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group col-12">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group col-12">
                <label for="adress">Endereço:</label>
                <input type="text" class="form-control" name="adress" id="adress" value="<?php echo $adress; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="postal">CEP:</label>
                <input type="text" class="form-control" name="postal" id="postal" value="<?php echo $postal; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="city">Cidade:</label> 
                <select class="form-control" name="city" id="city">
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
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="born">Data de nascimento:</label>
                <input type="date" class="form-control" name="born" id="born" value="<?php echo $born; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="sexo">Sexo:</label>
                <select class="form-control" name="sexo" id="sexo">
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
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="cellphone">Celular:</label>
                <input type="text" class="form-control" name="cellphone" id="cellphone" value="<?php echo $cellphone; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="home-cell">Telefone Residencial:</label>
                <input type="text" class="form-control" name="home-cell" id="home-cell" value="<?php echo $homecell; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="mother">Nome da mãe:</label>
                <input type="text" class="form-control" name="mother" id="mother" value="<?php echo $mom; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="dad">Nome da pai:</label>
                <input type="text" class="form-control" name="dad" id="dad" value="<?php echo $dad; ?>">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="type">Tipo de diabetes:</label>
                <select name="type" class="form-control" id="type">
                <?php 
                    if($dtype == "1"){
                        echo '<option value="type-1" selected>Tipo 1</option>';
                        echo '<option value="type-2">Tipo 2</option>';
                    }else{
                        echo '<option value="type-1">Tipo 1</option>';
                        echo '<option value="type-2" selected>Tipo 2</option>';
                    }
                
                ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="treatment">Tratamento:</label>
                <select class="form-control" name="treatment" id="treatment">
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
                            echo '<option value="bomba">Bomba</option>';
                            echo '<option value="Medicamento" selected>Medicamento</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="twitter">Twitter:</label>
                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $redes["twitter"]; ?>">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="instagram">Instagram:</label>
                <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $redes["instagram"]; ?>">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $redes["facebook"]; ?>">
            </div>
            <div class="form-group col-12">
                <label for="obs">Observações:</label>
                <textarea class="form-control" name="obs" id="obs" cols="30" rows="10"><?php echo $ob; ?></textarea>
            </div>
            
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            
            <input type="submit" value="Salvar" name="action" class="btn btn-primary mb-3 mr-2">
            <input type="submit" value="Excluir" name="action" class="btn btn-danger mb-3">
        </form>
    </div>
</body>
</html>