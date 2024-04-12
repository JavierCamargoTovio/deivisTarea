<?php 

session_start();

if (isset($_SESSION['email']) && isset($_SESSION['nombres'])) {

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas no completadas</title>
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
                <a style="color:white;font-weight: bold;" class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </li>
        </ul>
    </div>
    <br>
    <div class="container">
    <h1 class="text-center p-3">Gestión de tareas </h1>
        <div class="col-12 p-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listar_tarea_completada.php">Listar tareas completadas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="listar_tarea_no_completada.php">Listar tareas NO completadas</a>
                </li>
               
            </ul>
            <br>
            <h3 class="text-center text-secondary">Listado de tareas no completadas</h3>
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
                    </tr>
                </thead>
                <tbody>
                    <!--agrego cuerpo de la tabla -->
                    <!--agrego conexion a la base de datos -->
                    <?php #inicio de codigo php
              include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
              $sql = $conexion->query("SELECT * FROM tbl_tarea where completada = 'NO'");

              while($datos = $sql->fetch_object()){ ?>

                    <tr>
                        <td><?= $datos->id_tarea ?></td>
                        <td><?= $datos->titulo ?></td>
                        <td><?= $datos->descripcion ?></td>
                        <td><?= $datos->fecha_creacion ?></td>
                        <td><?= $datos->fecha_finalizacion ?></td>
                        <td><?= $datos->completada ?></td>

                    </tr>
                    <?php } 
              ?>


                </tbody>
            </table>
        </div>

    </div>
    <?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>