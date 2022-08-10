<?php

// Mostra uma mensagem de acordo com o status

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-success">Ação não executada!</div>';
            break;
    }
}

$resultados = '';
//para cada posição de vagas vai se transformar em vaga
foreach ($vagas as $vaga) {
    $resultados .=          '<tr>

                                    <td>' . $vaga->id . '</td>
                                    <td>' . $vaga->titulo . '</td>
                                    <td>' . $vaga->descricao . '</td>
                                    <td>' . ($vaga->ativo == 's' ? 'Ativo' : 'Inativo') . '</td>
                                    <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td> 
                                    
                                    <td>

                                        <a href="editar.php?id=' . $vaga->id . '">
                                            <button type="button" class="btn btn-primary">Editar</button>
                                        </a>

                                        <a href="excluir.php?id=' . $vaga->id . '">
                                            <button type="button" class="btn btn-danger">Excluir</button>
                                        </a>

                                    </td>

                                </tr>';
}

// Mostra uma mensagem caso a lista da tabela não tenha dados

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="6" class="text-center">
                                                        Nenhuma vaga encontrada
                                                        </td>
                                                       </tr>';

//GETS
unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET); //cria a query no formato http

// PAGINAÇÃO                                                      
    $paginacao = '';
    $paginas   = $obPagination->getPages();
    
    foreach($paginas as $key=>$pagina){

        $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
        $paginacao .= '<a href="?pagina='.$pagina['pagina'].'&'.$gets.'">
                            <button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
                      </a>';
    }
  
?>



<main>

    <!-- Imprime a mensagem de acordo com o status  -->
    <?= $mensagem ?>

    <!-- Botão para cadastrar uma nova vaga -->
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success mt-3">Nova vaga</button>
        </a>
    </section>


    <!-- Uma seção para filtrar as vagas -->

    <section>

        <form method="get">
            <div class="row my-4">

                <div class="col">
                    <label>Buscar por título</label>
                    <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
                </div>

                <div class="col">
                    <label>Status</label>
                    <select name="filtroStatus" class="form-control">
                      <option value="">Ativa/Inativa</option> 
                      <option value="s" <?=$filtroStatus == 's' ? 'selected' : ''?>>Ativa</option> 
                      <option value="n" <?=$filtroStatus == 'n' ? 'selected' : ''?>>Inativa</option> 
                    </select>
                </div>

                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>

            </div>
        </form>

    </section>

    <section>
        <table class="table bg-light rounded-3 mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?= $resultados ?>
            </tbody>

        </table>
    </section>

    <!-- Imprime a pginação  -->
<section>
    <?=$paginacao?>
</section>

</main>