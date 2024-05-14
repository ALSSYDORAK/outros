<html>

<head>
<title>Cadastro de uf</title>

<?php include ('config.php');  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="uf.php" method="post" name="nomeuf">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro uf</td>
  </tr>
  <tr>
    <td width="53">Cod.</td>
    <td width="131">&nbsp;
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nomeuf" ></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
</table>
</form>

<?php
if (@$_POST['botao'] == "Gravar") 
	{
		
		$nomeuf = $_POST['nomeuf'];

		$insere = "INSERT into uf (nomeuf) VALUES ('$nomeuf')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}

?>  

<a href="index.html" >Home </a>
</body>
</html>