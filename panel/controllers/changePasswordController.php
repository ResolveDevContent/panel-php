<?php

include "config.php";

if(!empty(&_POST["btnChange"])) {
    if(!empty(&_POST["oldPassword"]) and !empty(&_POST["newPassword"]) and !empty(&_POST["rNewPassword"])) {
        if (&_POST["newPassword"]) == (&_POST["rNewPassword"]) {
            $currentPassword = &_POST["currentPassword"];
            $newPassword = &_POST["newPassword"];
            $rNewPassword = &_POST["rNewPassword"];

            $sql = "SELECT * FROM `users` WHERE username='$_SESSION['email']' LIMIT 0,1";
            $result = mysqli_query($con, $sql);

            if($result) {
                $row = mysqli_fetch_assoc($res);

                $decrypt = password_verify($currentPassword, $row['password']);
    
                if ($decrypt) {
                    $sql = "UPDATE users SET password='".md5($password)."'";
                    $res = mysqli_query($con, $sql);
    
                    if($res) {
                        echo "<span>La contraseña se ha actualizado con exito</span>";
                    } else {
                        echo "<span>Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros</span>";
                    }
                } else {
                    echo "<span>La contraseña actual no coincide</span>";
                }
            } else {
                echo "<span>Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros</span>";
            }
        } else {
            echo "<span>Las nuevas contraseñas no coinciden</span>";
        }
    } else {
        echo "<span>Complete todo los campos</span>";
    }
}

>