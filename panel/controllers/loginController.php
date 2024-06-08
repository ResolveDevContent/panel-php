<?php

include_once "config.php";

if(!empty($_POST["btnLogin"])) {
    if(!empty($_POST["email"]) and !empty($_POST["password"])) {
        $response = '<div class="loader-container d-flex justify-center">
                        <div class="loader"></div>    
                    </div>';

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = ? LIMIT 0,1";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_email);

            $param_email = $email;

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if($result) {
                    if(mysqli_num_rows($result) == 0) {
                        $response = "Email y/o contraseña incorrectos";
                    } else {
                        $row = mysqli_fetch_assoc($result);
              
                        $decrypt = password_verify($password, $row['password']);
        
                        if ($decrypt) {
                            $_SESSION['email'] = $row['email'];
                            setcookie("usuarioLogeado", $email, time() + (86400 * 30), "/");
                            header("location: index.php");
                        } else {
                            $response = "Email y/o contraseña incorrectos";
                        }
                    }
                } else {
                    $response = "Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros";
                }
            } else {
                $response = "Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros";
            }

            mysqli_stmt_close($stmt);

        } else {
            $response = "Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros";
        }
    } else {
        $response = "Complete todo los campos";
    }
}


mysqli_close($link);

sleep(4);

$response = '';

?>