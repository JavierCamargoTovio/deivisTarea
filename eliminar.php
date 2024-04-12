<?php
include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
$id=$_GET['id'];
#echo $id;#pruebas del valor de la variable
$sql = $conexion->query("SELECT * FROM tbl_tarea WHERE id_tarea = $id"); #selecciono todos los datos de la tabla tbl_tarea

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar tarea</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
</head>


<body>

    <form class="col-4 p-3 m-auto" method="POST">
        <!--agrego col-4 -->
        <h3 class="text-center text-secondary">Eliminar tarea</h3>
        <!--agrego titulo de formulario y cambio color -->
        <input type="hidden" name="id" value="<?= $_GET[$id] ?>">
        <?php #inicio de codigo php
        include "controlador/eliminar_tarea.php"; #incluyo el archivo modificar_tarea.php
        while ($datos = $sql->fetch_object()) { ?>

        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="<?= $datos->titulo ?>">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripcion ?>">
        </div>

        <div class="mb-3">
            <label for="fecha1" class="form-label">Fecha de creación</label>
            <input type="date" class="form-control" name="fecha_creacion" value="<?= $datos->fecha_creacion?>">
        </div>

        <div class="mb-3">
            <label for="fecha2" class="form-label">Fecha de finalización</label>
            <input type="date" class="form-control" name="fecha_finalizacion" value="<?= $datos->fecha_finalizacion?>">
        </div>

        <div class="mb-3">
            <label for="completada" class="form-label">Completada</label>
            <input type="text" class="form-control" name="completada" value="<?= $datos->completada?>">
        </div>

        <div>

            <button type="button" class="btn btn-secondary">
                <a style="text-decoration: none; color:white " class="volver"
                    href="index.php">Cancelar</a>
            </button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Eliminar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Está seguro que desea eliminae el registro?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-danger" name="btnEliminar" value="ok">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>

    <?php }
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>