<?php
include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
$id=$_GET['id'];
#echo $id;#pruebas del valor de la variable
$sql = $conexion->query("SELECT * FROM tbl_tarea WHERE id_tarea = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <form class="col-4 p-3 m-auto" method="POST"><!--agrego col-4 -->
        <h3 class="text-center text-secondary">Ver tarea</h3> <!--agrego titulo de formulario y cambio color -->
        <input type="hidden" name="id" value="<?= $_GET[$id] ?>">
        <?php #inicio de codigo php
        include "controlador/ver_tarea.php"; #incluyo el archivo modificar_tarea.php
        while ($datos = $sql->fetch_object()) { ?> 
   


      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" name= "titulo" disabled value="<?= $datos->titulo ?>">
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control" name= "descripcion" disabled value="<?= $datos->descripcion ?>">
      </div>

      <div class="mb-3">
        <label for="fecha1" class="form-label">Fecha de creación</label>
        <input type="date" class="form-control" name= "fecha_creacion" disabled value="<?= $datos->fecha_creacion?>">
      </div>

      <div class="mb-3">
        <label for="fecha2" class="form-label" disabled >Fecha de finalización</label>
        <input type="date" class="form-control" name= "fecha_finalizacion" disabled value="<?= $datos->fecha_finalizacion?>">
      </div>
      
      <div class="mb-3">
        <label for="completada" class="form-label">Completada</label>
        <input type="text" class="form-control" name= "completada" disabled value="<?= $datos->completada?>">
      </div>

      <div>
        
      <button type="button" class="btn btn-secondary">
     <a style="text-decoration: none; color:white " class="volver" href="index.php">Volver</a>
      </button>
    
     
      </div>
    </form>
      
        <?php }
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>