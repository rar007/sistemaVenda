<?php
    $dbConfig = array();
    $dbConfig['host'] = 'localhost';
    $dbConfig['user'] = 'userVenda';
    $dbConfig['pass'] = 'sen1234';
    $dbConfig['base'] = 'sistemaVenda';

    $desc = '';

    if(isset($_POST['salvar']))
    {
        $conn = mysqli_connect(
            $dbConfig['host'],
            $dbConfig['user'],
            $dbConfig['pass'],
            $dbConfig['base']
        );

        $desc = mysqli_escape_string($conn, $_POST['desc']);

        if(mysqli_connect_errno() != 0){
            echo "<p>Não foi possível Acessar o banco</p>";
        }
        else
        {
            $sql = "INSERT INTO status_venda(descricao) VALUES ('{$desc}')";

            if(mysqli_query($conn, $sql))
            {
                echo "<p>Dados salvos com sucesso</p>";

            }
            else
            {
                echo "<p>Não foi possível salvar o Status da Venda</p>";
            }
            mysqli_close($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Satus de Venda</title>
</head>
<body>
    <form action="cad-status_venda.php" method="post">
        <table>
            <tr>
                <th>Cadastro de Status de Venda</th>
            </tr>
            <tr>
                <td><label>Digite o nome para o status:</label></td>
                <td><input type="text" name="desc" id="desc" maxlegth="20"></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="salvar" id="salvar" value="Salvar"></td>
            </tr>
        </table>
    </form>
</body>
</html>