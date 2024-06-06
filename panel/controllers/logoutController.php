<?php

include "config.php";

if(!empty(&_POST["btnLogout"])) {
    session_start();

    if(session_destroy()) {
        unset($_COOKIE['usuarioLogeado']); 
    
        setcookie('usuarioLogeado', null, -1, '/'); 
    
        header("Location: login.php");
    } else {
        echo "Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros";
    }

    die;
}

>