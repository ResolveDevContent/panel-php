<?php

    // Attempt select query execution
    $sql = "SELECT * FROM $tabla";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            $array = mysqli_fetch_array($result);

            $response = "<table class='fl-table'>";
                $response .= "<thead>";
                    $response .= "<tr>";
                        foreach( $array as $key => $value ){
                            $response .= "<th>" . $key . "</th>";
                        }
                    $response .= "</tr>";
                $response .= "</thead>";
                $response .= "<tbody>";
                    $response .= "<tr>";
                    foreach( $array as $key => $value ){
                            $response .= "<td><span>" . $value . "</span></td>";
                            // $response .= "<td>";
                            //     $response .= "<ul class='d-flex align-center'>";
                            //         $response .= "<li><a href='read.php?proyectoId=". $row['proyectoId'] ."' title='Ver'><i class='icon ver'></i></a></li>";
                            //         $response .= "<li><a href='update.php?proyectoId=". $row['proyectoId'] ."' title='Actualizar'><i class='icon editar'></i></a></li>";
                            //         $response .= "<li><a href='delete.php?proyectoId=". $row['proyectoId'] ."' title='Borrar'><i class='icon borrar'></i></a></li>";
                            //     $response .= "</ul>";
                            // $response .= "</td>";
                        }
                        $response .= "</tr>";
                $response .= "</tbody>";                            
            $response .= "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            $response = '<div class="empty-state d-flex flex-col justify-center align-center">
                            <i class="icon info"></i>
                            <span>No se encontraron proyectos</span>
                        </div>';
        }
    } else{
        $response = '<div class="empty-state d-flex flex-col justify-center align-center">
                        <i class="icon info"></i>
                        <span>Ha ocurrido un error, intentelo nuevamente y si el mismo persiste comuniquese con nosotros</span>
                    </div>';
    }

    // Close connection
    mysqli_close($link);

    echo $response;
?>