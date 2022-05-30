<?php

    function conectar(){
        $servidor = 'localhost';
        $usuario = 'root';
        $senha = '123456';
        $banco = 'info_mab';

        $conexao = mysql_connect($servidor, $usuario, $senha);

        if ($conexao) {
          $db = mysql_select_db($banco, $conexao);

          if ($db) {
            return true;
          } else {
            echo "Erro ao selecionar o banco de dados!";die;
          }

        } else {
          echo "Erro ao conectar com o banco!";die;
        }
    }
  
    function alert($mensagem){
        echo "<script language=\"javascript\">";
        echo "alert(\"$mensagem\");";
        echo "</script>";
    }

    function redirecionar($pagina){
        echo "<script language=\"javascript\">";
        echo "window.location.href = \"$pagina\";";
        echo "</script>";
    }

    function login(){        
        if (empty($_REQUEST['e_login']) || empty($_REQUEST['e_senha'])){
            alert('Dados Inválidos!');
            return redirecionar('index.php');
        };

        $query = "SELECT * FROM usuarios WHERE email = '{$_REQUEST['e_login']}' AND senha = '{$_REQUEST['e_senha']}'";
        $resultado = mysql_query($query);
        
        if ($usuario = mysql_fetch_assoc($resultado)) {
            session_start();
            
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];

            return redirecionar('cadastro_serie.php');
        } else {
            alert('Dados Inválidos!');
            return redirecionar('index.php');
        }

    }
?>
