<?php

include "config.php";

if(!empty(&_POST["btnLogin"])) {
    if(!empty(&_POST["email"]) and !empty(&_POST["password"])) {
        $email = &_POST["email"];
        $password = &_POST["password"];

        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 0,1";
        $result = mysqli_query($con, $sql);

        if($result) {
            if(mysqli_num_rows($result) == 0) {
                echo "<span>Email y/o contraseña incorrectos</span>";
            } else {
                $row = mysqli_fetch_assoc($res);
      
                $decrypt = password_verify($password, $row['password']);
    
                if ($decrypt) {
                    $_SESSION['email'] = $row['email'];
                    setcookie("usuarioLogeado", $email, time() + (86400 * 30), "/");
                    header("location: index.php");
                } else {
                    echo "<span>Email y/o contraseña incorrectos</span>";
                }
            }
        } else {
            echo "<span>Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros</span>";
        }
    } else {
        echo "<span>Complete todo los campos</span>";
    }
}

?>