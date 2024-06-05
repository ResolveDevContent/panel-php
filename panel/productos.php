<!DOCTYPE html>
<html lang="en">

    <?php include_once("includes/head.php"); ?>

    <body>
        <section style="display: flex">
            <?php include_once("includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-header clearfix">
                                    <h2 class="pull-left">Empleados</h2>
                                    <a href="create.php" class="btn btn-success pull-right">Agregar nuevo producto</a>
                                </div>
                                <?php
                                // Include config file
                                require_once "config.php";
                                
                                // Attempt select query execution
                                $sql = "SELECT * FROM products";
                                if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th>#</th>";
                                                    echo "<th>Nombre</th>";
                                                    echo "<th>Stock</th>";
                                                    echo "<th>Precio</th>";
                                                    echo "<th>Acción</th>";
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                    echo "<td>" . $row['productId'] . "</td>";
                                                    echo "<td>" . $row['nombre'] . "</td>";
                                                    echo "<td>" . $row['stock'] . "</td>";
                                                    echo "<td>" . $row['precio'] . "</td>";
                                                    echo "<td>";
                                                        echo "<a href='read.php?productId=". $row['productId'] ."' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                        echo "<a href='update.php?productId=". $row['productId'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                        echo "<a href='delete.php?productId=". $row['productId'] ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                        // Free result set
                                        mysqli_free_result($result);
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
            
                                // Close connection
                                mysqli_close($link);
                                ?>
                            </div>
                        </div>        
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>