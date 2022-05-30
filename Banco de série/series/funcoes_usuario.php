<?php

// Função inserir usuário
function inserir_usuario(){
    if (empty($_REQUEST['e_nome']) || empty($_REQUEST['e_email']) || empty($_REQUEST['e_senha'])) {
        alert("Preencha todos os campos!");
        return redirecionar("cadastro_usuario.php");
    }

    //verifica se usuário existe
    $query = "SELECT * FROM usuarios WHERE email = '{$_REQUEST['e_email']}'";
    $existe = mysql_query($query);
    
    if (mysql_num_rows($existe) == 0) {      
        
        // monta consulta concatenando as variáveis
        $query = "INSERT INTO usuarios (nome, email, senha) values ('{$_REQUEST['e_nome']}', '{$_REQUEST['e_email']}', '{$_REQUEST['e_senha']}')";
        $resultado = mysql_query($query);
        
        if ($resultado) {
            alert("Usuário inserido com sucesso!");
            return redirecionar("cadastro_usuario.php");
        } else {
            alert("Erro ao inserir usuário!");
            return redirecionar("cadastro_usuario.php");
        }
    } else {
        alert("Email já cadastrado!");
        return redirecionar("cadastro_usuario.php");
    }        
}