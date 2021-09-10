<?php

require("./funcoes.php");

$idFuncionario = $_GET ["id"];

deletarFuncionario(".dados/funcionarios.json", $idFuncionario);

header("location: index.php");

