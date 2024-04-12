<?php 

session_start();

if (isset($_SESSION['email']) && isset($_SESSION['nombres'])) {

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div style="background:#0B5FF0;">
        <ul class="nav justify-content-end">
            
            <li class="nav-item">
                <p class="nav-link" style="color:white;font-weight: bold; ">Bienvenido,
                    <?php echo $_SESSION['nombres']," ",  $_SESSION['apellidos']; ?></p>
            </li>
            <li class="nav-item">
            <a style="color:white;font-weight: bold;"class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </li>
        </ul>
    </div>





    <h1 class="text-center p-3">Gestión de tareas </h1>
    <div class="container">
    <ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link"  href="index.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="listar_tarea_completada.php">Listar tareas completadas</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="listar_tarea_no_completada.php">Listar tareas NO completadas</a>
  </li>
  
</ul>
<br>

        <form method="POST">
            <!--agrego col-4 -->
            <?php #inicio de codigo php
        include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
        include 'controlador/registro_tarea.php'; #incluyo el controlador de registro de la tarea
        ?>
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success p-6" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Nueva tarea
                </button>
            </div>
            <br>


            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar tarea</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="titulo">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion">
                            </div>
                            <div class="mb-3">
                                <label for="fecha1" class="form-label">Fecha de creación</label>
                                <input type="date" class="form-control" name="fecha1">
                            </div>
                            <div class="mb-3">
                                <label for="fecha2" class="form-label">Fecha de finalización</label>
                                <input type="date" class="form-control" name="fecha2">
                            </div>

                            <div class="mb-3">
                                <label for="completada" class="form-label">Completada</label>
                                <input type="text" class="form-control" name="completada" value="SI">
                            </div>

        </form>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </div>
    </div>
    </div>
    </div>



    <div class="col-12 p-12">
        <h3 class="text-center text-secondary">Listado de tareas</h3>
        <table class="table table-striped">
            <!--agrego tablas de boostrap https://getbootstrap.com/docs/5.3/content/tables/-->
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha creación</th>
                    <th scope="col">Fecha de finalización</th>
                    <th scope="col">Completada</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--agrego cuerpo de la tabla -->
                <!--agrego conexion a la base de datos -->
                <?php #inicio de codigo php
              include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
              $sql = $conexion->query("SELECT * FROM tbl_tarea");

              while($datos = $sql->fetch_object()){ ?>

                <tr>
                    <td><?= $datos->id_tarea ?></td>
                    <td><?= $datos->titulo ?></td>
                    <td><?= $datos->descripcion ?></td>
                    <td><?= $datos->fecha_creacion ?></td>
                    <td><?= $datos->fecha_finalizacion ?></td>
                    <td><?= $datos->completada ?></td>
                    <td>
                        <!--agrego botones de boostrap https://getbootstrap.com/docs/5.3/components/buttons/-->

                        <a href="ver.php?id=<?= $datos->id_tarea ?>" class="btn btn-small btn-primary"><i
                                class="fa-solid fa-eye"></i></a>

                        <a href="modificar.php?id=<?= $datos->id_tarea ?>" class="btn btn-small btn-warning"><i
                                class="fa-solid fa-pen-to-square"></i></a>

                        <a href="eliminar.php?id=<?= $datos->id_tarea ?>" class="btn btn-small btn-danger"><i
                                class="fa-solid fa-trash"></i></a>

                    </td>
                </tr>
                <?php } 
              ?>


            </tbody>
        </table>
    </div>


    <?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
    <!-- Bootstrap CSS https://getbootstrap.com/ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>