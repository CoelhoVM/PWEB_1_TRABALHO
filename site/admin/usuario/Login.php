<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body style="background-color: rgba(217, 217, 217, 0.10);">
 
    <div class="container d-flex justify-content-center">

        <div style="margin-top: 120px; padding: 50px; border-radius: 10px; width: 500px; box-shadow: 0 0 20px lightgray; background-color: white;">

            <h2 class="text-center" style="margin-bottom: 30px">Login</h2>
        
            <form action="login.php" method="post">

                <div class="mb-3">
                    <label for="username" class="form-label">Username ou E-mail</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="senha" class="form-control" id="senha" name="senha" required>
                </div>

                <div>
                    <a href="esqueci-senha.php" class="text-decoration-none" style="color: #9a5b54;">Esqueci minha senha</a>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px; width: 100%">Login</button>

                <div class="text-center" style="margin-top: 20px;">
                    <p>Não tem uma conta? <a href="UsuarioForm.php" class="text-decoration-none" style="color: #9a5b54;">Cadastre-se</a></p>
                </div>

            </form>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-7+9j8z4b1a56b5e8f8c4d3f7a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6" crossorigin="anonymous"></script>
     
</body>
</html>