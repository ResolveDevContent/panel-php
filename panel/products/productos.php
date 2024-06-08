<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include("../config.php");
        // require_once "../errors.php";
        
        $title = "Productos";
        include_once("../includes/head.php"); 

        $response = '<div class="loader-container d-flex justify-center">
                        <div class="loader"></div>    
                    </div>';
        
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper d-flex flex-col">
                    <header class="d-flex justify-between align-center">
                        <h2>Productos</h2>
                        <a href="create.php" class="btn btn-primary">Agregar nuevo producto</a>
                    </header>
                    <div class="table-wrapper">
                        <?php
                            echo $response;
                            // Include config file
                            require_once "../config.php";
                        
                            // Attempt select query execution
                            $sql = "SELECT * FROM products";
                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    $response = "<table class='fl-table'>";
                                        $response .= "<thead>";
                                            $response .= "<tr>";
                                                $response .= "<th>#</th>";
                                                $response .= "<th>Nombre</th>";
                                                $response .= "<th>Stock</th>";
                                                $response .= "<th>Precio</th>";
                                                $response .= "<th>Acción</th>";
                                            $response .= "</tr>";
                                        $response .= "</thead>";
                                        $response .= "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            $response .= "<tr>";
                                                $response .= "<td><span>" . $row['productId'] . "</span></td>";
                                                $response .= "<td><span>" . $row['nombre'] . "</span></td>";
                                                $response .= "<td><span>" . $row['stock'] . "</span></td>";
                                                $response .= "<td><span>" . $row['precio'] . "</span></td>";
                                                $response .= "<td>";
                                                    $response .= "<ul class='d-flex align-center'>";
                                                        $response .= "<li><a href='read.php?productId=". $row['productId'] ."' title='Ver'><i class='icon ver'></i></a></li>";
                                                        $response .= "<li><a href='update.php?productId=". $row['productId'] ."' title='Actualizar'><i class='icon editar'></i></a></li>";
                                                        $response .= "<li><a href='delete.php?productId=". $row['productId'] ."' title='Borrar'><i class='icon borrar'></i></a></li>";
                                                    $response .= "</ul>";
                                                $response .= "</>";
                                            $response .= "</tr>";
                                        }
                                        $response .= "</tbody>";                            
                                    $response .= "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    $response = '<div class="empty-state d-flex flex-col justify-center align-center">
                                                    <i class="icon info"></i>
                                                    <span>No se encontraron productos</span>
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
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>