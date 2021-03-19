<?php
    $dbConfig = array();
    $dbConfig['host'] = 'localhost';
    $dbConfig['user'] = 'userVenda';
    $dbConfig['pass'] = 'sen1234';
    $dbConfig['base'] = 'sistemaVenda';

    $nome = '';
    $preco = 0.0;
    $qtde = 0;
    $unidade = '';

    if(isset($_POST['salvar']))
    {
        $conn = mysqli_connect(
            $dbConfig['host'], 
            $dbConfig['user'], 
            $dbConfig['pass'], 
            $dbConfig['base']
        );
        $nome = mysqli_escape_string($conn, $_POST['nome']);
        $preco = (float) $_POST['preco'];
        $qtde = (int) $_POST['quantidade'];
        $unidade = (int)$_POST['unidade'];

        if(mysqli_connect_errno() != 0)
        {
            echo "<p>Não foi possivel se conectar ao banco de dados</p>";
        }
        else
        {
            $sql = "INSERT INTO produto(descricao, preco, qtde, unidade_id) VALUES ('{$nome}', {$preco}, {$qtde}, {$unidade})";
            
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
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <form action="cadastro-produto.php" method="post">
        <table>
            <tr>
                <th><h1>Cadastro de produto</h1></th>
            </tr>
            <tr>
                <td>
                    <label for="nome-do-produto">Nome do produto: </label>
                </td>
                <td>
                    <input type="text" name="nome" id="nome" maxlength="50"/>
                </td>
            </tr>
            <tr>
                <td><label for="preco">Preço: </label></td>
                <td><input type="number" name="preco" id="preco" step=".01"/></td>
            </tr>
            <tr>
                <td><label for="quantidade">Quantidade: </label></td>
                <td><input type="number" name="quantidade" id="quantidade"/></td>
            </tr>
            <tr>
                <td><label for="Unidade">Unidade de compra: </label></td>
                <td>
                    
                        <?php
                            $sql = "SELECT id, sigla FROM unidade";
                            $conn = mysqli_connect(
                                $dbConfig['host'], 
                                $dbConfig['user'], 
                                $dbConfig['pass'], 
                                $dbConfig['base']
                            );
                            if($res = mysqli_query($conn, $sql))
                            {
                                
                                    echo "<select name='unidade' id='unidade'>";
                                    while($registro = mysqli_fetch_assoc($res))
                                    {
                                        echo "<option value={$registro['id']}>{$registro['sigla']}</option>";
                                    }
                            }
                            mysqli_close($conn);
                            
                        ?>
                    </select>
                </td>
            </tr>
            </tr>
        </table> 
        <br>
        <input type="submit" name="salvar" value="Salvar" id="salvar">
        <input type="button" name="cancelar" value="Cancelar">
    </form>
    <br>
    <br>
    <br>
    <footer>&copy; 2021 Todos os direitos reservados</footer>
</body>
</html>