<?php

include "../db.class.php";

include_once "../../header.php";

$db = new db('usuarios');

if (!empty($_GET['id'])) {
    $db->destroy($_GET['id']);
}

if (!empty($_POST)) {
    $dados = $db->search($_POST);
} else {
    $dados = $db->all();
}

?>

    <h1 class="text-center" style="margin-top: 90px;">Lista de Usuários</h1>

    <form action="./UsuarioList.php" method="post">

        <div class="row mt-5">

            <div class="col-md-2">
                <select name="tipo" class="form-select">
                    <option value="username">Username</option>
                    <option value="nome">Nome</option>
                    <option value="email">Email</option>
                    <option value="telefone">Telefone</option>
                </select>
            </div>

            <div class="col-md-6">
                <input type="text" name="valor" placeholder="pesquisar..." class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a style="background-color: #9a5b54; border-color: #9a5b54;" href="./UsuarioForm.php" class="btn btn-secondary">Cadastrar</a>
            </div>

        </div>

    </form>

    <div style="margin-top: 50px; padding: 30px; border-radius: 10px; box-shadow: 0 0 20px lightgray; background-color: white;">

        <table class="table table-striped mt-3">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
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
                            <td>$item->username</td>
                            <td>$item->nome</td>
                            <td>$item->email</td>
                            <td>$item->telefone</td>
                            <td>
                                <a title='Editar' href='./UsuarioForm.php?id=$item->id'><i class='fa-solid fa-pen-to-square'></i></a>
                            </td>
                            <td>
                                <a  title='Deletar'
                                    onclick='return confirm(\"Deseja Excluir?\")'
                                    href='./UsuarioList.php?id=$item->id'><i class='fa-solid fa-trash'></i></a>
                            </td>
                        </tr>
                        ";
                    }
                    
                ?>
                
            </tbody>
        </table>
    </div>

<?php 

include_once "../../footer.php";

?>
