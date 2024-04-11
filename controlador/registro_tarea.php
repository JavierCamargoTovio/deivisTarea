<?php
if (!empty($_POST['btnregistrar'])) { //si el boton registrar no esta vacio
    if (!empty($_POST['titulo']) and !empty($_POST['descripcion']) //si los campos no estan vacios
    and !empty($_POST['fecha1'])and !empty($_POST['fecha2']) 
    and !empty($_POST['completada'])) {;
    
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_registro = $_POST['fecha1'];
        $fecha_finalizacion = $_POST['fecha2'];
        $completada = $_POST['completada'];
        
        $sql =$conexion->query("INSERT INTO tbl_tarea(titulo, descripcion, fecha_creacion, fecha_finalizacion, completada) 
        VALUES ('$titulo', '$descripcion', '$fecha_registro', '$fecha_finalizacion', '$completada')");

        
        if ($sql==1) {
            echo '<div class="alert alert-success" role="alert">
           Tarea registrada con exito
          </div>'; //mensaje de registro exitoso
        } else {
            echo '<div class="alert alert-danger">Error al registrar la tarea</div>'; //mensaje de error al registrar persona
        }
    } else {
        echo '<div class="alert alert-warning">Complete todos los campos</div>'; //mensaje de completar todos los campos
    }
}
?>