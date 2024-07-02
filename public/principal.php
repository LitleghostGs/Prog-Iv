<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<style>


</style>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 bg-primary" style="background-color: #00ff5573">
        Crud com a minha API
    </nav>

    <div class="container">

        <?php

        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                     ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        ?>

        <a href="novo.php" class="btn btn-primary mb-3"><i class="bi bi-plus-lg color-white  align-middle" style="padding-top: 1px">
            </i>Novo Usuário
        </a>

        <table class="table table-hover text-center ">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">OPÇÃO</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include  "bd_conn.php";
                $sql = "SELECT * FROM `usuarios`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="alterar.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="bi bi-pencil-square"></i></a>

                            <a href="excluir.php?id=<?php echo $row['id']; ?>" class="link-primary"><i class="bi bi-trash3-fill ms-3"></i></a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>

    </div>

    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>