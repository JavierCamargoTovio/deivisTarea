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
        
        $sql =$conexion->query("SELECT * FROM tbl_tarea WHERE id_tarea = $id");
    }
    }
    ?>