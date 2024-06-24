<?php

    // Attempt select query execution
    $sql = "SELECT $columns FROM $tabla";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){

            $response = "<table class='fl-table'>";
                $response .= "<thead>";
                    $response .= "<tr>";
                        $val = mysqli_fetch_fields($result);
                        for ($i=0; $i < count($val); $i++) {
                            $response .= "<th>" . $val[$i]->name . "</th>";
                        }
                        $response .= "<th>Acciones</th>";
                    $response .= "</tr>";
                $response .= "</thead>";
                $response .= "<tbody>";
                    while($row = mysqli_fetch_assoc($result)) {
                        $response .= "<tr>";
                            foreach($row as $key => $value) {
                                $response .= "<td>" . $value . "</td>";
                            }
                            $response .= "<td>";
                                $response .= "<ul class='d-flex align-center'>";
                                    $response .= "<li><a href='read.php?proyectoId=". $row['proyectoId'] ."' title='Ver'><i class='icon ver'></i></a></li>";
                                    $response .= "<li><a href='update.php?proyectoId=". $row['proyectoId'] ."' title='Actualizar'><i class='icon editar'></i></a></li>";
                                    $response .= "<li><a href='delete.php?proyectoId=". $row['proyectoId'] ."' title='Borrar'><i class='icon borrar'></i></a></li>";
                                $response .= "</ul>";
                            $response .= "</td>";
                        $response .= "</tr>";
                    }
                $response .= "</tbody>";                            
            $response .= "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            $response = '<div class="empty-state d-flex flex-col justify-center align-center">
                            <i class="icon info"></i>
                            <span>No se encontraron datos</span>
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