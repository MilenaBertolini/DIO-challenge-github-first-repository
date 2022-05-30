<?php

// Função inserir Epsodio
function inserir_epsodio(){
    
    if (empty($_REQUEST['e_nome']) || empty($_REQUEST['e_nome']) || empty($_REQUEST['e_temporada'])) {
        alert("Preencha todos os campos!");
        return redirecionar("cadastro_epsodio.php");
    }

    //verifica se epsódio existe
    $query = "SELECT * FROM epsodio WHERE nome = '{$_REQUEST['e_nome']}'";
    $existe = mysql_query($query);
    
    if (mysql_num_rows($existe) == 0) {      
        
        // monta consulta concatenando as variáveis
        $query = "INSERT INTO epsodios (numero, nome, temporadas_id) values ('{$_REQUEST['e_numero']}', '{$_REQUEST['e_nome']}', '{$_REQUEST['e_temporada']}')";
        $resultado = mysql_query($query);
        
        if ($resultado) {
            alert("Epsódio inserido com sucesso!");
            return redirecionar("cadastro_epsodio.php");
        } else {
            alert("Erro ao inserir epsódio!");
            return redirecionar("cadastro_epsodio.php");
        }
    } else {
        alert("Epsódio já cadastrado!");
        return redirecionar("cadastro_epsodio.php");
    }        
}

function excluir_epsodio()
{
    $query = "DELETE FROM epsodios where numero = '{$_REQUEST['epsodio']}'";
    $resultado = mysql_query($query);
    
    if ($resultado) {
        alert("Epsódio excluido com sucesso!");
        return redirecionar("cadastro_epsodio.php");
    } else {
        alert("Erro ao excluir epsódio!");
        return redirecionar("cadastro_epsodio.php");
    }
}