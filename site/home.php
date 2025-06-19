<?php

include "./admin/db.class.php";

$db = new db('usuarios');

$db->checkLogin();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <div class="container-fluid">

            <a href="#" class="logo mt-2"> <img src="/site/logo2.png" alt="Logo"
                                class="logo-img" height="55%" width="55%"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <a href="/site/index.php?logout=true" style="float: right;" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>

        </div>

    </nav>
    
    <div style="padding: 30px;">

        <div style="padding: 30px;">

            <p class="text-center fs-4 mt-5">Olá, <strong><?= $_SESSION['nome']?></strong>!</p>
            
            <h1 class="mt-3 text-center mb-5">Bem-vindo ao admin do Secret Recipe</h1>

        </div>

        <div class="text-center">

            <a href="admin/usuario/UsuarioList.php" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px;">Usuários</a> 
            <a href="admin/receita/ReceitaList.php" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px;">Receitas</a>
            <a href="admin/comentario/ComentarioList.php" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px;">Comentários</a>
            <a href="admin/ingrediente/IngredienteList.php" class="btn btn-primary" style="background-color: #9a5b54; border-color: #9a5b54; margin-top: 20px;">Ingredientes</a>

        </div>

    </div>

</body>
</html>