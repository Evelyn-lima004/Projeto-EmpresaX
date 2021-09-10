<?php

require("./funcoes.php");

$funcionarios = lerArquivo("./dados/funcionarios.json");
$count = count($funcionarios);

if (isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <script src="./script.js" defer></script>
    <title>EmpresaX</title>
</head>

<body>
    <h1>Funcionários da empresa X</h1>
    <p id="subtitle">A empresa conta com <?= $count ?> funcionários</p>
    <section>
        <form>
            <input type="text" placeholder="Buscar funcionário..." name="filtro" id="buscarFuncionario" value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />
            <button>Buscar</button>
        </form>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Endereço IP</th>
                <th>País</th>
                <th>Departamento</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            <?php foreach ($funcionarios as $funcionario) : ?>
                <tr>
                    <td><?= $funcionario->id ?></td>
                    <td><?= $funcionario->first_name ?></td>
                    <td><?= $funcionario->last_name ?></td>
                    <td><?= $funcionario->email ?></td>
                    <td><?= $funcionario->gender ?></td>
                    <td><?= $funcionario->ip_address ?></td>
                    <td><?= $funcionario->country ?></td>
                    <td><?= $funcionario->department ?></td>
                    <td> <button class="material-icons">&#9999;</button> </td>
                    <td><button onclick= "deletar(<?= $funcionario->id ?>)" class="material-icons">&#128465;</button> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <div id="add_new" onclick="showModal()">
        <p>+</p>
    </div>
    <div class="container-modal">
        <form action="acoes.php" method="POST">
            <h2>Adicione um novo funcionário</h2>
            <input type="text" name="id" required placeholder="Digite o Id">
            <input type="text" name="first_name" required placeholder="Digite o Nome">
            <input type="text" name="last_name" required placeholder="Digite o Sobrenome">
            <input type="text" name="email" required placeholder="Digite o E-mail">
            <select name="gender" id="gender" required placeholder="Digite o Sexo">
                <option value="" selected disabled>Selecione</option>
                <option value="Male">Masculino</option>
                <option value="Female">Feminino</option>
            </select>
            <input type="text" name="ip_address" required placeholder="Digite o Endereço IP">
            <input type="text" name="country" required placeholder="País">
            <input type="text" name="department" required placeholder="Digite o Departamento">
            <div class="buttons">
                <button id="cancel" type="button">Cancelar</button>
                <button id="send">Adicionar</button>
            </div>
        </form>

    </div>
</body>

</html>