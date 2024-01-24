<?php
    //incluir la conexión a la bd
    include("db.php");

    //valiadación si existe un id
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM lista WHERE id = $id";

        $resultado = mysqli_query($conn, $query);

        //Si falla algo en el query
        if(!$resultado){
            die("Falló la consulta de eliminación");
        }
        //Guardar mensaje que se mostrará después de borrar
        $_SESSION['message'] = 'Se eliminó correctamente de la lista';
        //Color y tipo 'danger' de mensaje en Bootstrap
        $_SESSION['message_type'] = 'danger';

        //Redireccionar si borra resultado correctamente
        header("Location: index.php");
    }
?>