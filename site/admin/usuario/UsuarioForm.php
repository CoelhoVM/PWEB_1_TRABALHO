<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Cadastro de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body style="background-color: rgba(217, 217, 217, 0.10);">

<header>

    <nav class="navbar bg-body-tertiary fixed-top"
        style="display: flex; background-color: #fdf1d8 !important; padding: 1rem 1.5rem;  box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);">

        <div class="container-fluid">
            <img src="/site/logo2.png" alt="Logo" class="mt-2" height="15%" width="15%">
        </div>

    </nav>

</header>
    
<div class="container d-flex justify-content-center">

    <div style="margin-top: 150px; margin-bottom: 120px; padding: 50px; border-radius: 10px; width: 718px; box-shadow: 0 0 20px lightgray; background-color: white;">

        <h2 class="text-center" style="margin-bottom: 30px">Cadastro</h2>

        <form action="UsuarioForm.php" method="post">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>

            <button type="submit" class="btn btn-primary"
                    style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px; width: 100%">Cadastrar</button>

            <div class="text-center" style="margin-top: 20px;">
                <p>Já tem uma conta? <a href="../usuario/login.php" class="text-decoration-none" style="color: #9a5b54;">Faça login</a></p>
            </div>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-7+9j8z4b1a56b5e8f8c4d3f7a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6" crossorigin="anonymous"></script>

</body>
</html>