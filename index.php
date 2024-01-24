<?php include("db.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA COMPRAS</title>
    <!--Bootstrap 5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Font Awesome para iconos de botones-->
    <script src="https://kit.fontawesome.com/07ff07af43.js" crossorigin="anonymous"></script>

    
</head>
<body>

<!-- Barra de navegación -->
<nav class="navbar bg-primary" data-bs-theme="dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">
        <i class="fas fa-shopping-cart"></i> LISTA DE COMPRAS</a>
    </div>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!--Llamar mensaje de guardado mediante variable de session() en db.php -->
              <!--validar si existe el valor 'mensaje' -->
            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <!--destruir la variable de sesión para que no salte el mensaje-->
            <?php session_unset();} ?>

             <!--Formulario para enviar artículos a la bd -->
            <div class="card card-body">
                <form action="crear.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Artículo" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">
                </form>
            </div>
        </div>

            <!--Tabla para ver artículos en BD -->
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Artículo</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT * FROM lista";
                        $resultado_lista = mysqli_query($conn, $query);
                        
                        while($row = mysqli_fetch_array($resultado_lista)){?>
                            <tr>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['descripcion']?></td>
                                <td><?php echo $row['fecha_creacion']?></td>
                                <!--Iconos de acciones editar, borrar -->
                                <td>
                                    <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>


