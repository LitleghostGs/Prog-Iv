<?php

include "bd_conn.php";
if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `usuarios`(`id`, `nome`, `email`) VALUES (NULL,'$nome','$email')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: index.php?msg="Cadastrado com sucesso"');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 bg-primary">
        Crud com a minha API
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h4 class="text-center responsive-text">Cadastrar novo usuário</h4>
            <p class="text-muted text-center responsive-text">Adicionar novo usuário no banco de dados</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">

                <div class="row">
                    <div class="col-12 col-sm-12 ">
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" class="form-control mb-2" required placeholder="Manuel Pinto Lamborne">
                        <label class="form-label" for="nome">email</label>
                        <input type="text" id="email" name="email" class="form-control mb-2" required placeholder="ex:nome@gmail.com">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success" name="submit">Cadastrar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>

            </form>
        </div>
    </div>

    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>