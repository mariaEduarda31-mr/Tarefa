<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //incluir a conexão de dados e o css
        include "referencias.php";

        //1 passo: Capturar o ID que será removido
        $id = $_POST["txtId"];
        $responsavel = $_POST["txtResponsavel"];
        $descricao = $_POST["txtDescricao"];
        $data_entrega = $_POST["txtData_entrega"];
        $prioridade = $_POST["txtPrioridade"];
        //2 passo: Construir o comando sql que sera executado
        $sql = "UPDATE tarefa SET responsavel = ?, descricao = ?, data_entrega = ?, prioridade = ? WHERE id = ? and responsavel = ?";

        //3 passo: Vincular onde o codigo sql com a conexão
        //ou seja, em que a conexao de dados sera executado
        $comando = $conexao->prepare($sql);

        //4 passo: Relacionar cada parametro (?) com o seu valor
        $comando->bind_param("ssssi",$responsavel, $descricao, $data_entrega, $prioridade, $id);

        //5 passo: Executar o comando no BDA
        if($comando->execute())
        {
            echo "<h1> Tarefa removida! </h1>";
        }
        else {
            echo "<h1> Não conseguimos resolver!! </h1>";
        }

        
        ?>

</body>
</html>