<?php

function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $arquivoArr = json_decode($arquivo);

    return $arquivoArr;

}

function buscarFuncionario($funcionarios, $filtro){

    $funcionariosFiltro = [];

    foreach($funcionarios as $funcionario){
        if(
            strpos($funcionario->first_name, $filtro) !== false
            || 
            strpos($funcionario->last_name, $filtro) !== false
            ||
            strpos($funcionario->department, $filtro) !== false
        ){
            $funcionariosFiltro[] = $funcionario;
        }
    }

    return $funcionariosFiltro;

}


//adicionando o funcionario
function adicionarFuncionario($nomeArquivo, $novoFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
  

}

function deletarFuncionario($nomeArquivo, $idFuncionario){
    $funcionarios = lerArquivo($nomeArquivo);
    foreach($funcionarios as $chave => $funcionario){
        if($funcionario->id == $idFuncionario) {
            echo "Funcionário deletado $funcionario";
            unset($funcionarios[$chave]);
        }
    }
               
   $json = json_encode(array_values($funcionarios));
   file_put_contents($nomeArquivo, $json);
}








//recebe o nome do arquivo
// function lerArquivo($nomeArquivo){
//     //lê o arquivo com string
//    $arquivo = file_get_contents($nomeArquivo);
//    // transforma a string em array
//    $jsonArray = json_decode($arquivo);
//    // devolve o array
//    return $jsonArray;
// }

// busca o funcionario dentro da lista e devolve uma lisa com os funcionarios encontrados
// function buscarFuncionarios($funcionarios, $nome){

//     $funcionariosFiltro = [];
//     foreach($funcionarios as $funcionario){
//         if ($funcionario->first_name == $nome){
//             $funcionariosFiltro[] = $funcionario;
//         }
//     }
//     return $funcionariosFiltro;
// }

// busca o departamento dentro da lista e devolve uma lisa com os funcionarios encontrados
// function search($funcionarios, $findme){

//     $funcionariosFiltro = [];
//     foreach($funcionarios as $funcionario){
//         if ($funcionario->findme == $findme){
//             $funcionariosFiltro[] = $funcionario;
//         }
//     }
//     return $funcionariosFiltro;
// }

