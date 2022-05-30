<?php 
    require_once 'funcoes.php'; //chama função de conectar com o banco de dados
    require_once 'funcoes_serie.php';
    conectar(); //conecta no banco de dados

    session_start();
    //verifica se está chamando função de salvar
    if (isset($_REQUEST['salvar']) && $_REQUEST['salvar'] == 1) {
        inserir_serie();
    }
    
    if (isset($_REQUEST['salvar']) && $_REQUEST['salvar'] == 2){
        excluir_serie();
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastre sua série</title>
</head>

<body>
<?php require_once 'menu.php'; ?>
<form id="form_cadastro" name="form_cadastro" method="post" action="cadastro_serie.php?salvar=1">
  <table width="400" border="2" align="center">
    <tr>
      <td colspan="2" align="center"><strong>CADASTRO SERIE</strong></td>
    </tr>

    <tr>
      <td width="200" align="right">Nome:</td>
      <td width="200"><label for="e_nome"></label>
      <input type="text" name="e_nome" id="e_nome"/></td>
    </tr>

    <tr>
      <td colspan="2" align="center"><input type="submit" name="botao_cadastar" id="button" value="Cadastrar" />
      <input type="reset" name="botao_limpar" id="botao_limpar" value="Limpar" /></td>
    </tr>
  </table>
</form>   
<br/>    
<table width="600" border="2" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th></th>
        </tr>
    </thead>
    <?php 
    
    //Seleciona todos os usuários
    $query = "SELECT * FROM series WHERE usuario_id = {$_SESSION['id_usuario']}";
    $resultado = mysql_query($query);
    
    //Passa por todos resultados da tabela e exibe os usuarios já cadastrados
    while ($serie = mysql_fetch_assoc($resultado)) { ?>
    <tr>
        <td align="center"><?php echo $usuario['id']; ?></td>
        <td><?php echo $serie['nome']; ?></td>
        <td><a href="cadastro_serie.php?salvar=2&serie=<?php echo $serie['id']; ?>">Deletar</a></td>
    </tr>
    <?php } ?>

</table>    
</body>
</html>
