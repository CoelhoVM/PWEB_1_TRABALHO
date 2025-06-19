<?php

include "../db.class.php";

include_once "../../header.php";

$db = new db('ingredientes');

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

    <h1 class="text-center" style="margin-top: 90px;">Lista de Ingredientes</h1>

    <form action="./IngredienteList.php" method="post">

        <div class="row mt-5">

            <div class="col-md-2">

                <select name="tipo" class="form-select">
                    <option value="titulo">Nome</option>
                    <option value="modo_preparo">Quantidade</option>
                    <option value="id_usuario">Id Receita</option>
                </select>

            </div>

            <div class="col-md-6">
                <input type="text" name="valor" placeholder="pesquisar..." class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a style="background-color: #9a5b54; border-color: #9a5b54;" href="./IngredienteForm.php" class="btn btn-secondary">Cadastrar</a>
            </div>

        </div>

    </form>

    <div style="margin-top: 50px; margin-bottom: 50px; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px lightgray; background-color: white;">

        <table class="table table-striped mt-3">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Id Receita</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody>

                <?php

                foreach ($dados as $item) {

                        echo "
                        <tr>
                            <th scope='row'>$item->id</th>
                            <td>$item->nome</td>
                            <td>$item->quantidade</td>
                            <td>$item->id_receita</td>
                            <td>
                                <a title='Editar' href='./IngredienteForm.php?id=$item->id'><i class='fa-solid fa-pen-to-square'></i></a>
                            </td>
                            <td>
                                <a  title='Deletar'
                                    onclick='return confirm(\"Deseja Excluir?\")'
                                    href='./IngredienteList.php?id=$item->id'><i class='fa-solid fa-trash'></i></a>
                            </td>
                        </tr>
                        ";
                    }
                    
                ?>
                
            </tbody>
        </table>
    </div>

<?php

include "../../footer.php";

?>