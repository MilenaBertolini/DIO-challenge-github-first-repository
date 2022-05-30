<?php

// Função inserir temporada

function inserir_temporada(){
    
    if (empty($_REQUEST['e_nome']) || empty($_REQUEST['e_serie'])) {
        alert("Preencha todos os campos!");
        return redirecionar("cadastro_temporada.php");
    }

    //verifica se usuário existe
    $query = "SELECT * FROM temporadas WHERE nome = '{$_REQUEST['e_nome']}'";
    $existe = mysql_query($query);
    
    if (mysql_num_rows($existe) == 0) {      
        
        // monta consulta concatenando as variáveis
        $query = "INSERT INTO temporadas (nome, series_id) values ('{$_REQUEST['e_nome']}', '{$_REQUEST['e_serie']}')";
        $resultado = mysql_query($query);
        
        if ($resultado) {
            alert("Temporada inserida com sucesso!");
            return redirecionar("cadastro_temporada.php");
        } else {
            alert("Erro ao inserir temporada!");
            return redirecionar("cadastro_temporada.php");
        }
    } else {
        alert("Temporada já cadastrada!");
        return redirecionar("cadastro_temporada.php");
    }        
}

function excluir_temporada()
{
    $query = "DELETE FROM temporadas where id = '{$_REQUEST['temporada']}'";
    $resultado = mysql_query($query);
    
    if ($resultado) {
        alert("Temporada excluida com sucesso!");
        return redirecionar("cadastro_temporada.php");
    } else {
        alert("Erro ao excluir temporada, verifique se não existe epsódios associadas!");
        return redirecionar("cadastro_temporada.php");
    }
}