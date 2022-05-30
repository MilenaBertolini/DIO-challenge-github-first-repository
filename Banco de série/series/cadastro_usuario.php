<?php 
    require_once 'funcoes.php'; //chama função de conectar com o banco de dados
    conectar(); //conecta no banco de dados

    // verifica se está chamando função de salvar
    if (isset($_REQUEST['salvar']) && $_REQUEST['salvar'] == 1) {
        require_once 'funcoes_usuario.php'; //função inserir usuário
        inserir_usuario();
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
<form id="form_cadastro" name="form_cadastro" method="post" action="cadastro_usuario.php?salvar=1">
  <table width="400" border="2" align="center">
    <tr>
      <td colspan="2" align="center"><strong>CADASTRO USUÁRIO</strong></td>
    </tr>

    <tr>
      <td width="200" align="right">Username:</td>
      <td width="200"><label for="e_nome"></label>
      <input type="text" name="e_nome" id="e_nome" /></td>
    </tr>
    <tr>
      <td align="right">Senha:</td>
      <td><label for="e_senha"></label>
      <input type="text" name="e_senha" id="e_senha" /></td>
    </tr>
    <tr>
      <td align="right">E-mail:</td>
      <td><label for="e_email"></label>
      <input type="text" name="e_email" id="e_email" /></td>
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
            <th>Email</th>
        </tr>
    </thead>
    <?php 
    
    //Seleciona todos os usuários
    $query = 'SELECT * FROM usuarios';
    $resultado = mysql_query($query);
    
    //Passa por todos resultados da tabela e exibe os usuarios já cadastrados
    while ($usuario = mysql_fetch_assoc($resultado)) { ?>
    <tr>
        <td align="center"><?php echo $usuario['id']; ?></td>
        <td><?php echo $usuario['nome']; ?></td>
        <td><?php echo $usuario['email']; ?></td>
    </tr>
    <?php } ?>

</table>    
</body>
</html>
