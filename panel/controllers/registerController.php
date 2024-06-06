<?php

include_once "config.php";

if(!empty($_POST['register']))
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users VALUES('$email', '" . md5($password) . "')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo "failure";
        }else{
            echo "success";   
        }
    } else {
        echo "no che"
    }
?>