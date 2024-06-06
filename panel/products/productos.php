<!DOCTYPE html>
<html lang="en">

    <?php
        session_start();

        include("../config.php");
        
        $title = "Productos";
        include_once("../includes/head.php"); 
        
        if (!isset($_SESSION['email'])) {
            header("location:login.php");
        }
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper d-flex flex-col">
                    <header class="d-flex justify-between align-center">
                        <h2>Empleados</h2>
                        <a href="create.php" class="btn">Agregar nuevo producto</a>
                    </header>
                    <div class="table-wrapper">
                        <?php
                        // Include config file
                        require_once "../config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM products";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='fl-table'>";
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
                                                echo "<a href='read.php?productId=". $row['productId'] ."' title='Ver' data-toggle='tooltip'><span ></span></a>";
                                                echo "<a href='update.php?productId=". $row['productId'] ."' title='Actualizar' data-toggle='tooltip'><span ></span></a>";
                                                echo "<a href='delete.php?productId=". $row['productId'] ."' title='Borrar' data-toggle='tooltip'><span ></span></a>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p><em>No records were found.</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
    
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>