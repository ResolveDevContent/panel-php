<?php

include_once "config.php";

if(!empty($_POST["btnChangePassword"])) {
    if(!empty($_POST["oldPassword"]) and !empty($_POST["newPassword"]) and !empty($_POST["rNewPassword"])) {
        if (($_POST["newPassword"]) == ($_POST["rNewPassword"])) {
            $currentPassword = $_POST["currentPassword"];
            $newPassword = $_POST["newPassword"];
            $rNewPassword = $_POST["rNewPassword"];
            $email = $_SESSION['email'];

            $sql = "SELECT * FROM users WHERE username='$email' LIMIT 0,1";
            $result = mysqli_query($link, $sql);

            if($result) {
                $row = mysqli_fetch_assoc($res);

                $decrypt = password_verify($currentPassword, $row['password']);
                
                if ($decrypt) {
                    $hpass = password_hash($newPassword, PASSWORD_DEFAULT);

                    $sql = "UPDATE users SET password='$hpass'";
                    $res = mysqli_query($link, $sql);
    
                    if($res) {
                        echo "La contraseña se ha actualizado con exito";
                    } else {
                        echo "Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros";
                    }
                } else {
                    echo "La contraseña actual no coincide";
                }
            } else {
                echo "Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros";
            }
        } else {
            echo "Las nuevas contraseñas no coinciden";
        }
    } else {
        echo "Complete todo los campos";
    }
}

?>