<?php
    require_once "config.php";
    
    if($tabla) {
        $imagenes = '';
        $result = '';

        if($filtro) {
            $query = "SELECT * FROM '$tabla' WHERE '$filtro' = ?";

            if($stmt = mysqli_prepare($sql, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $param);
        
                $param = $_GET["proyectoId"];

                if(mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                } else {
                    header("location: 404page.php");
                }
            } else {
                header("location: 404page.php");
            }
        } else {
            $query = "SELECT * FROM '$tabla'";

            $result = mysqli_query($sql, $query);
        }

        if($result) {
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $imagenes .= '<li>';
                    $imagenes .= '<span class="loader"></span>';
                    $imagenes .= "<img src='". $row['portada'] ."' alt=''>";
                $imagenes .= '</li>';
            } else {
                header("location: 404page.php");
            }
        } else {
            header("location: 404page.php");
        }
    } else {
        header("location: 404page.php");
    }
?>

<nav class="nav-arrows d-flex align-center justify-between" data-arrows>
    <a href="#" data-arrow="-1" class="d-flex">
        <i class="icon arrow-left"></i>
    </a>
    <a href="#" data-arrow="1" class="d-flex">
        <i class="icon arrow-right"></i>
    </a>
</nav>
<ul class="d-flex align-center" data-scrollable>
    <?php
        echo $imagenes;
    ?>
</ul>