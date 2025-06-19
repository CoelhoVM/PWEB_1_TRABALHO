<?php

include "../db.class.php";

include_once "../../header.php";

$dbUsuario = new db('usuarios');
$usuarios = $dbUsuario->all();

$db = new db('comentarios');

$db->checkLogin();

$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {
    $data = (object) $_POST;

    if (empty(trim($_POST['titulo']))) {
        $errors[] = "<li>O título é obrigatório!</li>";
    }

    if (empty(trim($_POST['texto']))) {
        $errors[] = "<li>O Texto é obrigatório!</li>";
    }

    if (empty(trim($_POST['data']))) {
        $errors[] = "<li>A data é obrigatória!</li>";
    }

    if (empty(trim($_POST['id_usuario']))) {
        $errors[] = "<li>O Id do usuário é obrigatório!</li>";
    }

    if (empty($errors)) {
        try {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                $success = "Comentário adicionado com sucesso!";
            } else {
                $db->update($_POST);
                $success = "Comentário atualizado com sucesso!";
            }

            echo "<script>
                    setTimeout(() => window.location.href = 'ComentarioList.php', 1500);
                  </script>";
        } catch (Exception $e) {
            $errors[] = "Erro ao salvar: " . $e->getMessage();
        }
    }
}

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}
?>

<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger mt-5 w-50 mx-auto">
        <strong>Erro ao salvar</strong>
        <ul class="mb-0">
            <?php foreach ($errors as $error) echo $error; ?>
        </ul>
    </div>
<?php } ?>

<?php if (!empty($success)) { ?>
    <div class="alert alert-success mt-5 w-50 mx-auto">
        <strong><?= $success ?></strong>
    </div>
<?php } ?>
 

        <h1 class="text-center" style="margin-top: 90px;">Cadastro de Comentários</h1>

        <div class="mt-5 p-5 mx-auto" style="margin-top: 150px; margin-bottom: 120px; width: 718px; background-color: white; border-radius: 10px; box-shadow: 0 0 20px lightgray;">

            <form action="ComentarioForm.php" method="post">

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <div class="mb-3">
                <label for="texto" class="form-label">Texto</label>
                <input type="text" class="form-control" id="texto" name="texto" required>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>

            <div class="mb-3">

                <label for="id_usuario" class="form-label">Usuário</label>

                <select name="id_usuario" class="form-select" required>

                    <?php
                    foreach ($usuarios as $usuario) {
                    ?>
                        <option value="<?= $usuario->id ?>">
                            <?= $usuario->nome ?>
                        </option>
                    <?php
                    }
                    ?>

                </select>

            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px; width: 100%">Comentar</button>

            </form>
        </div>

<?php 

include_once "../../footer.php"; 

?>