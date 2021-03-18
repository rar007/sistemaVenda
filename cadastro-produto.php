<?php
    $dbConfig = array(
        'host' => 'localhost',
        'user' => 'userVenda',
        'pass' => 'sen1234',
        'database' => 'sistemaVenda'
    );
    $conn = mysqli_connect($dbConfig['host'], ['user'], ['pass'], ['database']);

    $nome = '';
    $preco = 0.0;
    $qtde = 0;
    $unidade = '';

    if(isset($_POST['salvar']))
    {
        $nome = preg_replace('ˆ/[a-zA-Z0-9]\s\s+/', '', $_POST['nome']);
        $preco = (float) $_POST['preco'];
        $qtde = (int) $_POST['qtde'];

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
                    <input type="text" name="nome" id="nome"/>
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
                    <select name="unidade" id="unidade">
                        <?php
                            echo "<option id = >kg</option>";
                        ?>
                    </select>
                </td>
            </tr>
                
                
                
            </tr>
        </table> 
        
        <br>
        <input type="submit" name="salvar" value="Salvar">
        <input type="button" name="cancelar" value="Cancelar">
    </form>
    <br>
    <br>
    <br>
    <footer style="text-alignt='center';">&copy; 2021 Todos os direitos reservados</footer>
</body>
</html>