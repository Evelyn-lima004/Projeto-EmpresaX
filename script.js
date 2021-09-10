function showModal(){
    document.querySelector(".container-modal").style.display = "flex";
}

function deletar(idFuncionario){
    // pede a confirmação do usário para deletar
    let confirmacao = confirm("Deseja deletar o funcionário?");

    // se confirmar que quer apagar, redireciona para arquivo de ação com o id como parâmetro
    if(confirmacao){
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}