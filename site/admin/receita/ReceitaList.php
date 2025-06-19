<?php

include "../db.class.php";

include_once "../../header.php";

$db = new db('receitas');

$dbIngredientes = new db('ingredientes');

$db->checkLogin();

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

    <h1 class="text-center" style="margin-top: 90px;">Lista de Receitas</h1>

    <form action="./ReceitaList.php" method="post">

        <div class="row mt-5">

            <div class="col-md-2">

                <select name="tipo" class="form-select">
                    <option value="titulo">Titulo</option>
                    <option value="modo_preparo">Modo de Preparo</option>
                    <option value="tempo_preparo">Tempo de Preparo</option>
                    <option value="dificuldade">Dificuldade</option>
                    <option value="id_usuario">Id Usuário</option>
                </select>

            </div>

            <div class="col-md-6">
                <input type="text" name="valor" placeholder="pesquisar..." class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a style="background-color: #9a5b54; border-color: #9a5b54;" href="./ReceitaForm.php" class="btn btn-secondary">Cadastrar</a>
            </div>

        </div>

    </form>

    <div style="margin-top: 50px; margin-bottom: 50px; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px lightgray; background-color: white;">

        <table class="table table-striped mt-3">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Modo de Preparo</th>
                    <th scope="col">Tempo de Prep.</th>
                    <th scope="col">Dificuldade</th>
                    <th scope="col">Id Usuário</th>
                    <th scope="col">Ingredientes</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($dados as $item): ?>

                    <tr>
                        <th scope="row"><?= $item->id ?></th>
                        <td><?= $item->titulo ?></td>
                        <td style="max-width: 300px"><?= $item->modo_preparo ?></td>
                        <td><?= $item->tempo_preparo ?></td>
                        <td><?= $item->dificuldade ?></td>
                        <td><?= $item->id_usuario ?></td>
                        <td>
                            <ul style="padding-left: 16px;">

                                <?php
                                    $ingredientes = $dbIngredientes->ingredientesPorReceita($item->id);
                                    if (count($ingredientes) > 0) {
                                        foreach ($ingredientes as $ing) {
                                            echo "<li>$ing->quantidade de $ing->nome</li>";
                                        }
                                    } else {
                                        echo "<li><em>Nenhum ingrediente cadastrado.</em></li>";
                                    }
                                ?>
                                
                            </ul>
                        </td>

                        <td>
                            <a title='Editar' href='./ReceitaForm.php?id=<?= $item->id ?>'><i class='fa-solid fa-pen-to-square'></i></a>
                        </td>

                        <td>
                            <a title='Deletar' onclick='return confirm("Deseja Excluir?")' href='./ReceitaList.php?id=<?= $item->id ?>'><i class='fa-solid fa-trash'></i></a>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

<?php

include "../../footer.php";

?>