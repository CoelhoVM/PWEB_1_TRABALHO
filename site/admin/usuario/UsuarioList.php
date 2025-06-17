<?php
include "../db.class.php";
?>

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

<div class="container">

    <div class="row">

            <h1 class="text-center" style="margin-top: 90px;">Lista de Usuários</h1>

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

                            

                        ?>
                        
                    </tbody>
                </table>
            </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-7+9j8z4b1a56b5e8f8c4d3f7a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6" crossorigin="anonymous"></script>
        
</body>
</html>