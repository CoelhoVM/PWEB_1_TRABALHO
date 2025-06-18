<?php

include "../db.class.php";

$db = new db('receitas');

$dbUsuario = new db('usuarios');
$usuarios = $dbUsuario->all();

$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {
    $data = (object) $_POST;

    if (empty(trim($_POST['titulo']))) {
        $errors[] = "<li>O título é obrigatório!</li>";
    }

    if (empty(trim($_POST['modo_preparo']))) {
        $errors[] = "<li>O modo de preparo é obrigatório!</li>";
    }

    if (empty(trim($_POST['tempo_preparo']))) {
        $errors[] = "<li>O tempo de preparo é obrigatório!</li>";
    }

    if (empty(trim($_POST['dificuldade']))) {
        $errors[] = "<li>A dificuldade é obrigatória!</li>";
    }

    if (empty(trim($_POST['id_usuario']))) {
        $errors[] = "<li>O Id do usuário é obrigatório!</li>";
    }

    if (empty($errors)) {
        try {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                $success = "Receita adicionada com sucesso!";
            } else {
                $db->update($_POST);
                $success = "Receita atualizada com sucesso!";
            }

            echo "<script>
                    setTimeout(() => window.location.href = 'ReceitaList.php', 1500);
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
    <div class="alert alert-danger">
        <strong>Erro ao salvar</strong>
        <ul class="mb-0">
            <?php foreach ($errors as $error) echo $error; ?>
        </ul>
    </div>
<?php } ?>

<?php if (!empty($success)) { ?>
    <div class="alert alert-success">
        <strong><?= $success ?></strong>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Receita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: rgba(217, 217, 217, 0.10);">

<div class="container">

    <h1 class="text-center" style="margin-top: 90px;">Cadastro de Receitas</h1>

    <div class="mt-5 p-5 mx-auto" style="margin-top: 150px; margin-bottom: 120px; width: 718px; background-color: white; border-radius: 10px; box-shadow: 0 0 20px lightgray;">

        <form action="ReceitaForm.php" method="post">

            <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $data->titulo ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="modo_preparo" class="form-label">Modo de Preparo</label>
                <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" value="<?= $data->modo_preparo ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="tempo_preparo" class="form-label">Tempo de Preparo</label>
                <input type="text" class="form-control" id="tempo_preparo" name="tempo_preparo" value="<?= $data->tempo_preparo ?? '' ?>" required>
            </div>

            <div class="mb-3">

                <label class="form-label">Dificuldade</label><br>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="dificuldade" id="facil" value="Fácil"
                        <?= (!empty($data->dificuldade) && $data->dificuldade == 'Fácil') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="facil">Fácil</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="dificuldade" id="medio" value="Médio"
                        <?= (!empty($data->dificuldade) && $data->dificuldade == 'Médio') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="medio">Médio</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="dificuldade" id="dificil" value="Difícil"
                        <?= (!empty($data->dificuldade) && $data->dificuldade == 'Difícil') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="dificil">Difícil</label>
                </div>

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

            <button type="submit" class="btn btn-primary w-100" style="background-color: #9a5b54; border-color: #9a5b54;">
                Salvar Receita
            </button>

            

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
