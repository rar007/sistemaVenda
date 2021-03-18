<?php
    $dbConfig = array(
        'host' => "localhost",
        'user' => "userVenda",
        'pass' => "sen1234",
        'database' => "sistemaVenda"
    );
    
    $nome = '';
    $sigla = '';

    if(isset($_POST["salvar"]))
    {
        echo $_POST["nome-unidade"];
        
        echo $nome;
        $nome = $_POST["nome-unidade"];
        $sigla = $_POST["sigla"];

        echo $nome;
    
        $conn = mysqli_connect("localhost", "userVenda", "sen1234", "sistemaVenda");
        print_r($dbConfig);
        exit();
        if(mysqli_connect_errno() != 0)
        {
            echo "<p>Não foi possivel se conectar ao banco de dados</p>";
        }
        else
        {
            echo "entrei na verificacao de conexao\n";
            $sql = "INSERT INTO unidade(descricao, sigla) VALUES ('{$nome}', '{$sigla}')";
            echo "montei a query" . $sql . "\n";
           /*  if(mysqli_query($conn, $sql))
            {
                echo "Unidade Salva com sucesso";
            }
            else
            {
                echo "Nao foi possivel salvar os dados";
            } */

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