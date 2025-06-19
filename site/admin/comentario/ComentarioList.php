<?php

include "../db.class.php";

include_once "../../header.php";

$db = new db('comentarios');

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

    <h1 class="text-center" style="margin-top: 90px;">Lista de Comentários</h1>

    <form action="./ComentarioList.php" method="post">

        <div class="row mt-5">

            <div class="col-md-2">

                <select name="tipo" class="form-select">
                    <option value="titulo">Titulo</option>
                    <option value="texto">Texto</option>
                    <option value="data">Data</option>
                    <option value="id_usuario">Id Usuário</option>
                </select>

            </div>

            <div class="col-md-6">
                <input type="text" name="valor" placeholder="pesquisar..." class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a style="background-color: #9a5b54; border-color: #9a5b54;" href="./ComentarioForm.php" class="btn btn-secondary">Cadastrar</a>
            </div>

        </div>

    </form>

    <div style="margin-top: 50px; margin-bottom: 50px; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px lightgray; background-color: white;">

        <table class="table table-striped mt-3">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Texto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Id Usuário</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($dados as $item): ?>

                    <tr>
                        <th scope="row"><?= $item->id ?></th>
                        <td><?= $item->titulo ?></td>
                        <td style="max-width: 300px"><?=$item->texto?></td>
                        <td><?=$item->data?></td>
                        <td><?=$item->id_usuario?></td>
                        <td>
                            <a title='Editar' href='./ComentarioForm.php?id=<?= $item->id ?>'><i class='fa-solid fa-pen-to-square'></i></a>
                        </td>

                        <td>
                            <a title='Deletar' onclick='return confirm("Deseja Excluir?")' href='./ComentarioList.php?id=<?= $item->id ?>'><i class='fa-solid fa-trash'></i></a>
                        </td>
                    </tr>
                
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>