<?php
include("db.php");
    
    //Validación si existe guadar por el método POST
    if(isset($_POST['guardar'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        //Query para insertar datos de formulario en bd
        $query = "INSERT INTO lista(nombre, descripcion) VALUES ('$nombre', '$descripcion')";
        $resultado = mysqli_query($conn, $query);

        //Si falla el envío o el query, corta el proceso
        if(!$resultado){
            die("Algo falló en envó a la bd");
        }

        //Guardar mensaje que se mostrará después de guardar
        $_SESSION['message'] = 'El artículo se guardó correctamente';
        //Color y tipo 'success' de mensaje en Bootstrap
        $_SESSION['message_type'] = 'success';

        //redireccionar después de guardar
        header("Location: index.php");
    }
?>