
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Relatório do Aluno</title>
    <?php include('config.php'); ?>
</head>
<body>
    <form action="relatoriolst.php?botao=gravar" method="post" name="form1">
        <table width="95%" border="1" align="center">
            <tr>
                <td colspan="5" align="center">Relatório de Aluno</td>
            </tr>
            <tr>
                <td align="right">Nome do Aluno:</td>
                <td><input type="text" name="nomealu"></td>
                <td align="right">Data de Nascimento:</td>
                <td><input type="text" name="data_ncto" size="3"></td>
                <td align="right">Nome do Municipio:</td>
                <td><input type="text" name="fk_mun_codigomun" size="3"></td>
                <td align="right">Nome da UF:</td>
                <td><input type="text" name="nomeuf" size="3"></td>
                <td><input type="submit" name="botao" value="Gerar"></td>
            </tr>
        </table>
    </form>

    <?php
    if (@$_POST['botao'] == "Gerar") {
        $nomealu = $_POST['nomealu'];
        $data_ncto = $_POST['data_ncto'];
        $fk_mun_codigomun = $_POST['fk_mun_codigomun'];
        $nomeuf = $_POST['nomeuf'];

        $query = "SELECT nomealu, data_ncto, fk_mun_codigomun, nomeuf FROM aluno WHERE aluno.nomealu > 0";
        $params = array();
        if ($nomealu) {
            $query .= " AND nomealu LIKE ?";
            $params[] = "%$nomealu%";
        }
        if ($data_ncto) {
            $query .= " AND data_ncto LIKE ?";
            $params[] = "%$data_ncto%";
        }
        if ($fk_mun_codigomun) {
            $query .= " AND fk_mun_codigomun LIKE ?";
            $params[] = "%$fk_mun_codigomun%";
        }
        if ($nomeuf) {
            $query .= " AND nomeuf LIKE ?";
            $params[] = "%$nomeuf%";
        }

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($coluna = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<th width='25%'>" . $coluna['nomealu'] . "</th>";
            echo "<th width='20%'>" . $coluna['data_ncto'] . "</th>";
            echo "</tr>";
        }
    }
    ?>
</body>
</html>


