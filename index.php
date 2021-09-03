<?php

require("./funcoes.php");

$funcionarios = lerArquivo("funcionarios.json");

if(isset($_GET["buscarFuncionario"])){
   $funcionarios = buscarFuncionarios($funcionarios, $_GET["buscarFuncionario"]);
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="styleeshet" href="./style.css"/>
    <title>EmpresaX</title>
</head>
<body>
<form>
        <input type="text" value= "<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] :"" ?>"
        name="buscarFuncionario"placeholder="Buscar Aluno" />
        <button>Buscar</button>
    </form>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Endereço Ip</th>
            <th>País</th>
            <th>Departamento</th>
        </tr>
        <?php
        foreach ($funcionarios as $funcionario) :
        ?> 
           <tr>
               <td><?= $funcionario->id; ?></td>
               <td><?= $funcionario->first_name; ?></td>
               <td><?= $funcionario->last_name; ?></td>
               <td><?= $funcionario->email; ?></td>
               <td><?= $funcionario->gender; ?></td>
               <td><?= $funcionario->ip_address; ?></td>
               <td><?= $funcionario->country; ?></td>
               <td><?= $funcionario->department; ?></td>
           </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>
</html>