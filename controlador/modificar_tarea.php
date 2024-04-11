<?php
if (!empty($_POST['btnregistrar'])) { //si el boton registrar no esta vacio
    if (!empty($_POST['titulo']) and !empty($_POST['descripcion']) //si los campos no estan vacios
    and !empty($_POST['fecha_creacion'])and !empty($_POST['fecha_finalizacion']) 
    and !empty($_POST['completada'])) {;

    
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_creacion = $_POST['fecha_creacion'];
        $fecha_finalizacion = $_POST['fecha_finalizacion'];
        $completada = $_POST['completada'];
        
        $sql =$conexion->query("UPDATE tbl_tarea SET titulo='$titulo', descripcion='$descripcion', fecha_creacion='$fecha_creacion', fecha_finalizacion='$fecha_finalizacion', completada='$completada' WHERE id_tarea = $id"); //modificar datos de la tabla tbl_tarea
        if ($sql==1) {
            header("Location: index.php");  
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el registro</div>";
           
        }
    
    }else {
        echo "<script> alert('Todos los campos son obligatorios'); </script>";
    }
}
?>