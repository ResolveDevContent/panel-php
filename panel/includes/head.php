<?php 

if($title != "Login") {
    if (!isset($_COOKIE["usuarioLogeado"]) || empty($_COOKIE["usuarioLogeado"])) {
        header("Location: ./login.php");
        exit;
    }
} else {
    if (isset($_COOKIE["usuarioLogeado"])) {
        header("Location: ./index.php");
        exit;
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/panel.css">
    <link rel="stylesheet" href="../css/icons.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/desktop.css" media="screen and (min-width: 960px)">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width: 959px)">
    <link rel="stylesheet" href="panel/css/desktop.css" media="screen and (min-width: 960px)">
    <link rel="stylesheet" href="panel/css/mobile.css" media="screen and (max-width: 959px)">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="user.css">
    <title><?php echo $title; ?> - Panel</title>
</head>