<?php 

session_start(); 

include "modelo/conexion.php";
if (!empty($_POST['btnIniciar'])) { 
if (isset($_POST['email']) && isset($_POST['contrasena'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $contrasena = validate($_POST['contrasena']);

    if (empty($email)) {

        header("Location: login.php?error= El email es requerido");

        exit();

    }else if(empty($contrasena)){

        header("Location: login.php?error=La contraseña es requerida");

        exit();

    }else{

        $sql = "SELECT * FROM tbl_usuario WHERE email='$email' AND contrasena='$contrasena'";

        $result = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['contrasena'] === $contrasena) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['nombres'] = $row['nombres'];

                $_SESSION['apellidos'] = $row['apellidos'];

                header("Location: index.php");  

                exit();

            }else{

                header("Location: login.php?error=El usuario o la contraseña incorrecta");

                exit();

            }

        }else{

            header("Location: login.php?error=Error con el usuario o la contraseña ");  

            exit();

        }

    }

}else{

    header("Location: login.php");  

    exit();

}
}