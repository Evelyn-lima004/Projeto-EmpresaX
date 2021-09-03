<?php

//recebe o nome do arquivo
function lerArquivo($nomeArquivo){
    //lê o arquivo com string
   $arquivo = file_get_contents($nomeArquivo);
   // transforma a string em array
   $jsonArray = json_decode($arquivo);
   // devolve o array
   return $jsonArray;
}

// busca o funcionario dentro da lista e devolve uma lisa com os funcionarios encontrados
function buscarFuncionarios($funcionarios, $nome){

    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionario){
        if ($funcionario->first_name == $nome){
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}

function buscarDepartamento($funcionarios, $nome){

    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionario){
        if ($funcionario->first_name == $nome){
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}