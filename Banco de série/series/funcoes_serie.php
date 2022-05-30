<?php
session_start();

// Função inserir serie
function inserir_serie(){
    if (empty($_REQUEST['e_nome'])) {
        alert("Preencha o nome da série!");
        return redirecionar("cadastro_serie.php");
    }

    //verifica se série existe
    $query = "SELECT * FROM series WHERE nome = '{$_REQUEST['e_nome']}' AND usuario_id = {$_SESSION['id_usuario']}";
    $existe = mysql_query($query);
    
    if (mysql_num_rows($existe) == 0) {      
        
        // monta consulta concatenando as variáveis
        $query = "INSERT INTO series (nome, usuario_id) values ('{$_REQUEST['e_nome']}', {$_SESSION['id_usuario']})";
        $resultado = mysql_query($query);

        if ($resultado) {
            alert("Série inserida com sucesso!");
            return redirecionar("cadastro_serie.php");
        } else {
            alert("Erro ao inserir série!");
            return redirecionar("cadastro_serie.php");
        }
    } else {
        alert("Série já cadastrada!");
        return redirecionar("cadastro_serie.php");
    }        
}

function excluir_serie()
{
    $query = "DELETE FROM series where id = '{$_REQUEST['serie']}'";
    $resultado = mysql_query($query);
    
    if ($resultado) {
        alert("Série excluida com sucesso!");
        return redirecionar("cadastro_serie.php");
    } else {
        alert("Erro ao excluir série, verifique se não existe temporadas associadas!");
        return redirecionar("cadastro_serie.php");
    }
}
