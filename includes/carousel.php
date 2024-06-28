<?php
    $imagenes = '';
    if(mysqli_num_rows($result) > 0) {
        if(mysqli_num_rows($result) > 1) {
            $imagenes .= '<nav class="nav-arrows d-flex align-center justify-between" data-arrows>
                            <a href="#" data-arrow="-1" class="d-flex">
                                <i class="icon arrow-right" style="transform: rotate(-180deg)"></i>
                            </a>
                            <a href="#" data-arrow="1" class="d-flex">
                                <i class="icon arrow-right"></i>
                            </a>
                        </nav>';
        }

        $imagenes .= '<ul class="carousel d-flex align-center w-100" data-scrollable>';

        while($row = mysqli_fetch_array($result)) {
            $imagenes .= '<li>';
                $imagenes .= '<span class="loader"></span>';
                $imagenes .= "<img src='panel/proyectos/". $row['portada'] ."' alt=''>";
            $imagenes .= '</li>';
        }

        $imagenes .= '</ul>';
    }
?>