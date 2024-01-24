<?php
    //Importar conexión
    include("db.php");
    //Validar si existe id seleccionado
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM lista WHERE id = $id";
        $resultado = mysqli_query($conn, $query);

        //Comprobar filas que tiene el resultado y si solo tiene 1
        if(mysqli_num_rows($resultado)==1){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
        }
    }
    
    //Params para actualizar recibidos por formulario
    if(isset($_POST['editar'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE lista SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id ";
        mysqli_query($conn, $query);

        //Guardar mensaje que se mostrará después de update
        $_SESSION['message'] = 'Se modificó el artículo correctamente';
        //Color y tipo 'warning' de mensaje en Bootstrap
        $_SESSION['message_type'] = 'warning';


        header("Location: index.php");
    }
?>

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
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar artículo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualizar descripción"><?php echo $descripcion;?></textarea>
                    </div>
                    <button class="btn btn-success" name="editar">
                        Editar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>