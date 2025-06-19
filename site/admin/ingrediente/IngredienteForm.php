<?php

include "../db.class.php";

include_once "../../header.php";

$db = new db('ingredientes');

$dbReceita = new db('receitas');
$receitas = $dbReceita->all();

$db->checkLogin();

$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {
    $data = (object) $_POST;

    if (empty(trim($_POST['nome']))) {
        $errors[] = "<li>O nome é obrigatório!</li>";
    }

    if (empty(trim($_POST['quantidade']))) {
        $errors[] = "<li>A quantidade é obrigatória!</li>";
    }

    if (empty(trim($_POST['id_receita']))) {
        $errors[] = "<li>O Id da receita é obrigatório!</li>";
    }

    if (empty($errors)) {
        try {
            if (empty($_POST['id'])) {
                $db->store($_POST);
                $success = "Ingrediente adicionado com sucesso!";
            } else {
                $db->update($_POST);
                $success = "Ingrediente atualizado com sucesso!";
            }

            echo "<script>
                    setTimeout(() => window.location.href = 'IngredienteList.php', 1500);
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


    <h1 class="text-center" style="margin-top: 90px;">Cadastro de Ingredientes</h1>

    <div class="mt-5 p-5 mx-auto" style="margin-top: 150px; margin-bottom: 120px; width: 718px; background-color: white; border-radius: 10px; box-shadow: 0 0 20px lightgray;">

        <form action="IngredienteForm.php" method="post">

            <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $data->nome ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="text" class="form-control" id="quantidade" name="quantidade" value="<?= $data->quantidade ?? '' ?>" required>
            </div>


            <div class="mb-3">

                <label for="id_receita" class="form-label">Receita</label>

                <select name="id_receita" class="form-select" required>

                    <?php
                    foreach ($receitas as $receita) {
                    ?>
                        <option value="<?= $receita->id ?>">
                            <?= $receita->titulo ?>
                        </option>
                    <?php
                    }
                    ?>

                </select>

            </div>

            <button type="submit" class="btn btn-primary w-100" style="background-color: #9a5b54; border-color: #9a5b54;">
                Salvar Ingrediente
            </button>

            

        </form>

    </div>

<?php include_once "../../footer.php"; ?>
