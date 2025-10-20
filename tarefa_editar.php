<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <?php
        //CODIGO PARA REALIZAR BUSCA NO BANCO DE DADOS
        // PRIMEIRO PASSO: CAPTURAR OS DADOS DE ENTRADA

        $id = $_POST["txtId"];

        $descricao = "";
        $data_entrega = "";
        $prioridade = "";
        $responsavel = "";

        //2° PASSO: PREPARAR A INSTRUCAO SQL - SELECT
        $sql = "SELECT * FROM tarefa WHERE id = ? ";

        // 3° passo: INDICAR ONDE SERA EXECUTADO O COMANDO SQL

        $comando = $conexao -> prepare($sql);
        
        //4 PASSO: RELACIONAR OS PARAMETROS DO COMANDO SQL
        $comando->bind_param("i",$id);

        //5° PASSO: EXECUTAR COMANDO

            $comando->execute();
            
        //OS CODIGOS ABAIXO SÃO FEITOS APENAS
        // QUANDO HOUVER RETORNO DE DADOS DO 
        // BANCO DE DADOS (SELECT)

        // 6° PASSO: CAPTURAR OS DADOS VINDOS DO COMANDO SELECT
        $resultado = $comando->get_result();

        if($resultado->num_rows == 0)
        {
            echo "<h1>Tarefa inexistente</h1>";
        }
        else{
            $valores = $resultado->fetch_assoc();
            $descricao= $valores["descricao"];
            $responsavel= $valores["responsavel"];
            $data_entrega = $valores["data_entrega"];
            $prioridade = $valores["prioridade"];

            
        }
    ?>
    <form method="post" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Tarefa :: Editar</h2>
                <div class="form-group">
                    <label>Id</label>
                    <input value = "<?php echo $id?>" type="text" class="form-control" required="" placeholder="Id da tarefa" name="txtId">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input value = "<?php echo $descricao?>"type="text" class="form-control" required="" placeholder="Descricao da tarefa" name="txtDescricao">
                </div>

                <div class="form-group">
                    <label>Data</label>
                    <input value = "<?php echo $data_entrega?>"type="date" class="form-control" required="" name="txtData">
                </div>

                <div class="form-group">
                    <label>Prioridade</label>
                    <select name="txtPrioridade" class="form-control">
                        <option value="Alta">Alta</option>
                        <option value="Média">Média</option>
                        <option value="Baixa">Baixa</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Responsável</label>
                    <input value = "<?php echo $responsavel?>"type="text" class="form-control" placeholder="Responsável pela tarefa" name="txtResponsavel">
                </div>


                <br>
                <div class="form-group">

                    <button formaction = "tarefa_atualizar.php" type="submit" class="btn btn-primary" name="btEditar">
                        Editar
                    </button>

                    <button formaction = "tarefa_remover.php" type="submit" class="btn btn-warning" name="btExcluir">
                        Excluir
                    </button>


                    <a href="index.php">
                        <button type="button" class="btn btn-danger" name="btVoltar">
                            Voltar
                        </button>
                    </a>

                </div>

            </div>
        </div>
    </div>
    </form>

</body>

</html>