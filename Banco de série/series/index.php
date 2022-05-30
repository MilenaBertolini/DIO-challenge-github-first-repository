<?php
    require_once 'funcoes.php';
    conectar(); // conecta no banco de dados
    
    if (isset($_REQUEST['entrar']) && $_REQUEST['entrar'] == 1) {
        login();        
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastre sua série</title>
</head>

<body>
<form id="form_login" name="form_login" method="post" action="index.php?entrar=1">
  <table width="400" border="2" align="center">
    <tr>
      <td colspan="2" align="center"><strong>LOGIN</strong></td>
    </tr>

    <tr>
      <td width="200" align="right">Email:</td>
      <td width="200"><label for="e_login"></label>
      <input type="text" name="e_login" id="e_login"/></td>
    </tr>
    <tr>
      <td width="200" align="right">Senha:</td>
      <td width="200"><label for="e_senha"></label>
      <input type="text" name="e_senha" id="e_senha"/></td>
    </tr>

    <tr>
      <td colspan="2" align="center"><input type="submit" name="botao_entrar" id="button" value="Entrar" />
      <input type="reset" name="botao_limpar" id="botao_limpar" value="Limpar" /></td>
    </tr>
  </table>
</form>   
<br/>       
</body>
</html>