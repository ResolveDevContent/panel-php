<?php

include_once "config.php";

if(!empty($_POST['register'])) {
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $hpass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, password) VALUES('$email', '$hpass')";
        $result = mysqli_query($link, $sql);

        if($result){
            echo "Se registro correctamente";
        } else {
            echo "failure";
        }
    } else {
        echo "Complte todos los campos";
    }
}

mysqli_close($link);

?>