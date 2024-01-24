<?php

//variable de sesión para mostrar mensajes de acciones en index
session_start();

//Conexión a base de datos
//bloque para capturar excepciones en conexión
try {
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'crud_compras'
    );

    //Descomentar si se quiere ver mensaje de que la conexion es exitosa
    /*if(isset($conn)){
        echo 'La conexión a la BD fue exitosa';
    }
    */
}
catch (Exception $e) {
    echo $e->getMessage();
}

?>