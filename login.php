<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" src="css/estilo.css" type="text/css">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
        </style>

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5">Iniciar sesion</h2>
                            <form method="POST">
                                <!--agrego col-4 -->
                                <?php #inicio de codigo php
                                include 'modelo/conexion.php'; #incluyo la conexion a la base de datos
                                include 'controlador/consultar_usuario.php'; #incluyo el controlador de registro de la tarea
                                ?>
                                <?php if (isset($_GET['error'])) { ?>

                                <p style="color:red; class="error"><?php echo $_GET['error']; ?></p>

                                <?php } ?>
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form3Example3" class="form-control" name="email" />
                                    <label class="form-label" for="form3Example3">Email</label>
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="form3Example4" class="form-control" name="contrasena" />
                                    <label class="form-label" for="form3Example4">Contraseña</label>
                                </div>


                                <!-- Register buttons -->
                                <div class="text-center">
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary" name="btnIniciar" value="ok">Iniciar
                                        Sesion</button>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-succes"">
                                      <a href=" registrarse.php">Registrarse</a>
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://www.un.edu.mx/wp-content/uploads/2023/02/Universidad-del-Norte-Tableros-Kanban-digitales-subtitulo-1.png"
                        class="w-100 rounded-4 shadow-4" alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>