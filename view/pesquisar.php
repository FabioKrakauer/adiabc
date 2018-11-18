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
require("database.php");

?>

    <div class="container my-3">
    
        <form class="form-row mt-2" action="pesquisar.php?s=1" method="POST">

        <div class="col-12 row mb-2 mx-auto">
            <!-- <label class="col-12 col-md-2 col-form-label" for="filtro">Principal filtro:</label>
            <select class="form-control col-12 col-md-10" name="filtro" id="filtro">
                <option value="nome">Nome</option>
                <option value="email">Email</option>
                <option value="tipo">Tipo de diabetes</option>
                <option value="sexo">Sexo</option>
                <option value="city">Cidade</option>
            </select> -->
        </div>
        

            <div class="col-12 col-md-6 mb-2">
                <input class="form-control" type="text" name="name" placeholder="Digite um nome">
            </div>

            <div class="col-12 col-md-6 mb-2">
                <input class="form-control" type="email" name="email" placeholder="Digite o email">
            </div>

            <div class="col-12 col-md-4 mb-2">
                <select class="form-control" name="d_type">
                    <option value="null">Selecione um tipo</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="col-12 col-md-4 mb-2">
                <select class="form-control" name="sexo">
                    <option value="null">Selecione um sexo</option>
                    <option value="masc">Masculino</option>
                    <option value="fem">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div class="col-12 col-md-4 mb-2">
                <select class="form-control" name="city">
                    <option value="null">Selecione uma cidade</option>
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



        <input class="btn btn-primary ml-1" type="submit" value="Procurar">
    


        <?php 
            if(!isset($_GET["s"])){

            }else{
                $query = "SELECT * FROM `user`";
                $nome = isset($_POST["name"]) ? $_POST["name"] : "null";
                $email = isset($_POST["email"]) ? $_POST["email"] : "null";
                $dtype = isset($_POST["d_type"]) ? $_POST["d_type"] : "null";
                $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "null";
                $city = isset($_POST["city"]) ? $_POST["city"] : "null";

                $activeNome = false;
                $activeEmail = false;
                $activeDType = false;
                $activeSexo = false;
                $activeCity = false;
                $whereIsset = false;

                $cityID = 0;
                $citySearch = $db->query("SELECT `id` FROM `city` WHERE `name`='".$city."'");
                if($row = $citySearch->fetch()){
                    $cityID = $row["id"];
                }

                if($nome != ""){
                    $activeNome = true;
                    if($whereIsset){
                        $query .= " LIKE `nome`='".$nome."'";
                    }else{
                        $query .= " WHERE `nome`='".$nome."'";
                        $whereIsset = true;
                    }
                }
                if($email != ""){
                    $activeEmail = true;
                    if($whereIsset){
                        $query .= " LIKE `email`='".$email."'";
                    }else{
                        $query .= " WHERE `email`='".$email."'";
                        $whereIsset = true;
                    }
                }
                if($dtype != "null"){
                    $activeDType = true;
                    if($whereIsset){
                        $query .= " AND `tipo_diabetes`='".$dtype."'";
                    }else{
                        $query .= " WHERE `tipo_diabetes`='".$dtype."'";
                        $whereIsset = true;
                    }
                }
                if($sexo != "null"){
                    $activeSexo = true;
                    if($whereIsset){
                        $query .= " AND `sexo`='".$sexo."'";
                    }else{
                        $query .= " WHERE `sexo`='".$sexo."'";
                        $whereIsset = true;
                    }
                }
                if($city != "null"){
                    $activeCity = true;
                    if($whereIsset){
                        $query .= " AND `cidade`='".$cityID."'";
                    }else{
                        $query .= " WHERE `cidade`='".$cityID."'";
                        $whereIsset = true;
                    }
                }
        ?>
        <div class="container">
                <p class="text-center font-weight-bold">Pesquisas por:</p>
                <?php 
                    if($activeNome){
                        echo '<p class="text-center font-weight-bold text-success">NOME: VERDADEIRO</p>';
                    }else{
                        echo '<p class="text-center font-weight-bold text-danger">NOME: FALSO</p>';
                    }
                    if($activeEmail){
                        echo '<p class="text-center font-weight-bold text-success">EMAIL: VERDADEIRO</p>';
                    }else{
                        echo '<p class="text-center font-weight-bold text-danger">EMAIL: FALSO</p>';
                    }
                    if($activeDType){
                        echo '<p class="text-center font-weight-bold text-success">Tipo de diabetes: VERDADEIRO</p>';
                    }else{
                        echo '<p class="text-center font-weight-bold text-danger">Tipo de diabetes: FALSO</p>';
                    }
                    if($activeSexo){
                        echo '<p class="text-center font-weight-bold text-success">Sexo: VERDADEIRO</p>';
                    }else{
                        echo '<p class="text-center font-weight-bold text-danger">Sexo: FALSO</p>';
                    }
                    if($activeCity){
                        echo '<p class="text-center font-weight-bold text-success">Cidade: VERDADEIRO</p>';
                    }else{
                        echo '<p class="text-center font-weight-bold text-danger">Cidade: FALSO</p>';
                    }
                    
                
                ?>
                
        </div>
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
                <td><a href="user-profile.php?action=details&id=<?php echo $id; ?>" class="btn btn-success btn-sm">Ver detalhes</a></td>
            </tr>
        <?php }
    ?> 
        
        </table>
    </form>

    </div>

        <?php }
        ?>
</body>
</html>