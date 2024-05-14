<html>

<head>
<title>Cadastro de Aluno</title>

<?php include ('config.php');  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<form action="aluno.php" method="post" name="aluno">
<table width="200" border="1">
  <tr>
    <td colspan="2">Cadastro de aluno</td>
  </tr>
  <tr>
    <td width="53">codigo_alu.</td>
    <td width="131">&nbsp;
  </tr>
  <tr>
    <td>Nome:</td>
    <td><input type="text" name="nomealu" ></td>
  </tr>
 
  <tr>
    <td>data_ncto</td>
    <td><input type="date" name="data_ncto" ></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" value="Gravar" name="botao"></td>
    </tr>	
  <tr>
  </tr>
</table>
</form>

<?php
if (@$_POST['botao'] == "Gravar") 
	{
		$nomealu= $_POST['nomealu'];
		$data_ncto = $_POST['data_ncto'];
		
		$insere = "INSERT into aluno (nomealu, data_ncto) VALUES ('$nomealu', '$data_ncto')";
		mysqli_query($mysqli, $insere) or die ("Não foi possivel inserir os dados");
	}

?>  

<a href="index.html" >Home </a>
</body>
</html>