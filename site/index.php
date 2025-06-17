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
        
            <form action="login.php" method="post">

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="senha" class="form-control" id="senha" name="senha" required>
                </div>

                <div>
                    <a href="esqueci-senha.php" class="text-decoration-none" style="color: #9a5b54;">Esqueci minha senha</a>
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px; width: 100%">Login</button>

            </form>

        </div>

    </div>
    
    
</body>
</html>