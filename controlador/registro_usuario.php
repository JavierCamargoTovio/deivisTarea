<?php
if (!empty($_POST['btnregistrarusuario'])) { //si el boton registrar no esta vacio
    if (!empty($_POST['nombres']) and !empty($_POST['apellidos']) //si los campos no estan vacios
    and !empty($_POST['email'])and !empty($_POST['contrasena']) 
    ) {;
    
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        
        $sql =$conexion->query("INSERT INTO tbl_usuario(nombres, apellidos, email, contrasena) 
        VALUES ('$nombres', '$apellidos', '$email', '$contrasena')");

        
        if ($sql==1) {
            echo '<div class="alert alert-success" role="alert">
           Usuario registrado con exito
          </div>'; //mensaje de registro exitoso
        } else {
            echo '<div class="alert alert-danger">Error al registrar el usuario</div>'; //mensaje de error al registrar persona
        }
    } else {
        echo '<div class="alert alert-warning">Complete todos los campos</div>'; //mensaje de completar todos los campos
    }
}
?>