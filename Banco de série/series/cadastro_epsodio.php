<?php 
    require_once 'funcoes.php'; //chama função de conectar com o banco de dados
    require_once 'funcoes_epsodio.php'; //função inserir epsódio
    conectar(); //conecta no banco de dados

    session_start();
    //verifica se está chamando função de salvar
    if (isset($_REQUEST['salvar']) && $_REQUEST['salvar'] == 1) {
        inserir_epsodio();
    } 
    
    if (isset($_REQUEST['salvar']) && $_REQUEST['salvar'] == 2) {
        excluir_epsodio();
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
<form id="form_cadastro" name="form_cadastro" method="post" action="cadastro_epsodio.php?salvar=1">
  <table width="400" border="2" align="center">
    <tr>
      <td colspan="2" align="center"><strong>CADASTRO EPSODIO</strong></td>
    </tr>

    <tr>
      <td width="200" align="right">Número:</td>
      <td width="200"><label for="e_numero"></label>
      <input type="text" name="e_numero" id="e_numero"/></td>
    </tr>
      
    <tr>
      <td width="200" align="right">Nome:</td>
      <td width="200"><label for="e_nome"></label>
      <input type="text" name="e_nome" id="e_nome"/></td>
    </tr>
      <tr>
          <td width="200" align="right">
              Temporada:
          </td>
          <td>
            <select type="text" name="e_temporada" id="e_temporada">
                <option value="">Selecione a temporada...</option>
                <?php 
                    $query = "SELECT * FROM temporadas;";
                    $resultado = mysql_query($query);
                    
                    //Exibe as temporadas já cadastradas dentro do select
                    while ($epsodios = mysql_fetch_assoc($resultado)) : ?>
                    <option value="<?php echo $epsodios['id'] ?>"><?php echo $epsodios['nome']; ?></option>
                <?php endwhile; ?>
            </select>
          </td>
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
            <th>Número</th>
            <th>Nome</th>
            <th>Temporada</th>
            <th></th>
        </tr>
    </thead>
    <?php 
    
    //Seleciona todas os epsodios
    $query = "SELECT * FROM epsodios;";
    $resultado = mysql_query($query);
    
    //Passa por todos resultados da tabela e exibe aos epsodios já cadastrados
    while ($epsodios = mysql_fetch_assoc($resultado)) { ?>
    <tr>
        <td align="center"><?php echo $epsodios['numero']; ?></td>
        <td><?php echo $epsodios['nome']; ?></td>
        <td align="center"><?php echo $epsodios['temporadas_id']; ?></td>
        <td><a href="cadastro_epsodio.php?salvar=2&epsodio=<?php echo $epsodios['numero']; ?>">Deletar</a></td>
    </tr>
    <?php } ?>

</table>    
</body>
</html>
