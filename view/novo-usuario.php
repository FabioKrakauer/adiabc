<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criar usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>
<body>
    <form action="/control/new-user.php" method="POST">
        Nome: <input type="text" name="name" placeholder="Digite o nome" required><br>
        E-mail: <input type="email" name="email" placeholder="Digite o email"><br>
        Endereço: <input type="text" name="adress" placeholder="Digite o endereco" required><br>
        CEP: <input type="text" name="postal" placeholder="Digite o CEP" required><br>
        Cidade: <input type="text" name="city" placeholder="Digite o cidade" required><br>
        Data de nascimento: <input type="born" name="endereco" placeholder="Digite a data de nascimento" required><br>
        Celular: <input type="text" name="cellphone" placeholder="Digite o Celular"><br>
        Telefone Residencial: <input type="text" name="home-cell" placeholder="Digite o telefone residencial"><br>
        Nome da mãe: <input type="text" name="mother" placeholder="Digite o nome da mãe"><br>
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
        Instagram: <input type="text" name="twitter" placeholder="Digite o instagram"><br>
        Facebook: <input type="text" name="twitter" placeholder="Digite o facebook"><br><br>
        <textarea name="obs" cols="30" rows="10" placeholder="Digite as observações!"></textarea><br>
        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>