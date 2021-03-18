<?php
    $dbConfig = array();
    $dbConfig['host'] = 'localhost';
    $dbConfig['user'] = 'userVenda';
    $dbConfig['pass'] = 'sen1234';
    $dbConfig['base'] = 'sistemaVenda';
    
    $nome = '';
    $sigla = '';

    if(isset($_POST["salvar"]))
    {
        $nome = mysqli_escape_string($conn, $_POST['nome-unidade']);
        $sigla = $_POST['sigla'];
    
        $conn = mysqli_connect(
            $dbConfig['host'], 
            $dbConfig['user'], 
            $dbConfig['pass'], 
            $dbConfig['base']
        );

        if(mysqli_connect_errno() != 0)
        {
            echo "<p>Não foi possivel se conectar ao banco de dados</p>";
        }
        else
        {
            
            $sql = "INSERT INTO unidade(descricao, sigla) VALUES ('{$nome}', '{$sigla}')";
            
            if(mysqli_query($conn, $sql))
            {
                echo "<p>Unidade Salva com sucesso</p>";
            }
            else
            {
                echo "<p>Nao foi possivel salvar os dados</p>";
            }
            mysqli_close($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de unidade de produto</title>
</head>
<body>
    <form action="cadastro-unidade.php" method="post">
        <table>
            <tr>
                <th><h1>Cadastro de unidade</h1></th>
            </tr>
            <tr>
                <td><label for="nome">Nome da Unidade: </label></td>
                <td><input type="text" name="nome-unidade" id="nome-unidade" maxlength="30"></td>
            </tr>
            <tr>
                <td><label for="siglra">Sigla</label></td>
                <td><input type="text" name="sigla" id="sigla" maxlength="2"></td>
            </tr>
            <tr>
            <td><input type="submit" value="Salvar" name="salvar" id="salvar"></td>
            </tr>
        </table>
    </form>
    <a href="cadastro-produto.php">Cadastrar Produto</a>
</body>
</html>