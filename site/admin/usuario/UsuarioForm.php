<?php

include "../db.class.php";

include_once "../../header.php";

$db = new db('usuarios');

$db->checkLogin();

$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {

    $data = (object) $_POST;

    if (empty(trim($_POST['username']))) {
        $errors[] = "<li>O Username é obrigatório!</li>";
    }

    if (empty(trim($_POST['nome']))) {
        $errors[] = "<li>O nome é obrigatório!</li>";
    }

    if (empty(trim($_POST['email']))) {
        $errors[] = "<li>O email é obrigatório!</li>";
    }

    if (empty(trim($_POST['telefone']))) {
        $errors[] = "<li>O telefone é obrigatório!</li>";
    }

    if (empty($errors)) {

        try {
           
            if (!empty($_POST['senha'])) {
                $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            } else {
                unset($_POST['senha']); 
            }

            if (empty($_POST['id'])) {
                $db->store($_POST);
                $success = "Registro criado com sucesso!";
            } else {
                $db->update($_POST);
                $success = "Registro atualizado com sucesso!";
            }

            echo "<script>
                    setTimeout(() => window.location.href = 'UsuarioList.php', 1500);
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
            <?php foreach ($errors as $error) {
                echo $error;
            } ?>
        </ul>
    </div>
<?php } ?>

<?php if (!empty($success)) { ?>
    <div class="alert alert-success mt-5 w-50 mx-auto">
        <strong><?= $success ?></strong>
    </div>
<?php } ?>

    <h1 class="text-center" style="margin-top: 90px;">Cadastro de Usuários</h1>

    <div class="mt-5 p-5 mx-auto" style="margin-top: 150px; margin-bottom: 120px; width: 718px; background-color: white; border-radius: 10px; box-shadow: 0 0 20px lightgray;">

        <form action="UsuarioForm.php" method="post">
            <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= $data->username ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?= $data->nome ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= $data->email ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" id="telefone" name="telefone" class="form-control" value="<?= $data->telefone ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha <?= !empty($data->id) ? "(deixe em branco para não alterar)" : '' ?></label>
                <input type="password" id="senha" name="senha" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100" style="background-color: #9a5b54; border-color: #9a5b54;">Salvar</button>

        </form>
    </div>

<?php

include "../../footer.php"; 

?>
