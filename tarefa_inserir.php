<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: inserir</title>
    <?php
        include "referencias.php";
    
    
    ?>
</head>
<body>
    <?php
        // first step: operação insert
        // Capturar cada registro que deve ser inserido
        // INSERT INTRO () VALUES ()
        

    $descricao = $_POST["txtDescricao"];
    $DATA_ENTREGA = $_POST["txtdata"];
    $prioridade = $_POST["txtprioridade"];
    $responsavel = $_POST["txtresponsavel"];

    // second step: preparar o comando SQL que será executado
    // Criar uma variável e passar os parâmetros como (?)
    // Cada parâmetro ficará com uma interrogação (?)

    $sql = "INSERT INTO tarefa(descricao,data_entrega,prioridade,responsavel) VALUES (?,?,?,?)";

    // third step: Vincular onde o comando SQL será executado
    $comando = $conexao->prepare($sql);

    //  fourth step: associar cada (?) com seus respectivos valores
    $comando->bind_param("ssss",$descricao,$DATA_ENTREGA, $prioridade,$responsavel);

    // fifth step: executar o comando na conexao de dados

    if($comando->execute())
    {
        echo "<h1> tarefa marcada! </h1>";

    }
    else 
    {
        echo "<h1> Erro </h1>";
    }
        ?>
</body>
</html>