<?php

include "./admin/db.class.php";

$db = new db('usuarios');
$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {

    $data = (object) $_POST; 

    if (empty(trim($_POST['login']))) {
        $errors[] = "<li>O login é obrigatorio</li>";
    }

    if (empty(trim($_POST['senha']))) {
        $errors[] = "<li>O senha é obrigatorio</li>";
    }
    try {
        if (empty($errors)) {
            $result =  $db->login($_POST);

            if ($result !== "error") {

                session_start();

                $_SESSION['login'] = $result->login;
                $_SESSION['nome'] = $result->nome;
                $success = "Logado com sucesso!";

                echo "<script>
                        setTimeout(
                            ()=> window.location.href = 'home.php', 1500
                        )
                        </script>";
            } else {
                $errors[] = "<li>E-mail ou senha errado, tente novamente!</li>";
            }
        }
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}

if (!empty($_GET['logout'])) {
    session_start();
    session_destroy();
}

?>

<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger">
        <strong>Erro ao salvar</strong>
        <ul class="mb-0">
            <?php foreach ($errors as $error) { ?>
                <?= $error ?>
            <?php } ?>
        </ul>
    </div>
<?php } ?>

<?php if (!empty($success)) { ?>
    <div class="alert alert-success">
        <strong>
            <?= $success ?>
        </strong>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

    <div style="padding: 30px;">

        <h1 class="mt-5 text-center">Bem vindo ao admin do Secret Recipe</h1>
        <p class="text-center" style="font-size: 1.2rem;">Faça login para acessar o painel de administração.</p>

    </div>
 
    <div class="container d-flex justify-content-center">

        <div style="margin-top: 20px; margin-bottom: 50px; padding: 50px; border-radius: 10px; width: 500px; box-shadow: 0 0 20px lightgray; background-color: white;">

            <h2 class="text-center" style="margin-bottom: 30px">Login</h2>
        
            <form action="home.php" method="post">

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <div>
                    <a href="esqueci-senha.php" class="text-decoration-none" style="color: #9a5b54;">Esqueci minha senha</a>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px; width: 100%">Login</button>

            </form>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-7+9j8z4b1a56b5e8f8c4d3f7a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6" crossorigin="anonymous"></script>
    
</body>
</html>