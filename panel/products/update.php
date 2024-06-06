<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$nombre = $stock = $precio = "";
$nombre_err = $stock_err = $precio_err = "";
$loading = false;
 
// Processing form data when form is submitted
if(isset($_POST["productId"]) && !empty($_POST["productId"])){
    $loading = true;
    // Get hidden input value
    $productId = $_POST["productId"];
    
    // Validate name
    $input_name = trim($_POST["nombre"]);
    if(empty($input_name)){
        $nombre_err = "Por favor ingrese un nombre.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_err = "Por favor ingrese un nombre válido.";
    } else{
        $nombre = $input_name;
    }
    
    // Validate address address
    $input_stock = trim($_POST["stock"]);
    if(empty($input_stock)){
        $stock_err = "Por favor ingrese una dirección.";     
    } else{
        $stock = $input_stock;
    }
    
    // Validate salary
    $input_precio = trim($_POST["precio"]);
    if(empty($input_precio)){
        $precio_err = "Por favor ingrese el monto del salario del empleado.";     
    } elseif(!ctype_digit($input_precio)){
        $precio_err = "Por favor ingrese un valor positivo y válido.";
    } else{
        $precio = $input_precio;
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($stock_err) && empty($precio_err)){
        // Prepare an update statement
        $sql = "UPDATE products SET nombre=?, stock=?, precio=? WHERE productId=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_nombre, $param_stock, $param_precio, $param_productId);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_stock = $stock;
            $param_precio = $precio;
            $param_productId = $productId;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                $loading = true;
                header("location: productos.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["productId"]) && !empty(trim($_GET["productId"]))){
        // Get URL parameter
        $productId =  trim($_GET["productId"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE productId = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_productId);
            
            // Set parameters
            $param_productId = $productId;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nombre = $row["nombre"];
                    $stock = $row["stock"];
                    $precio = $row["precio"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">

    <?php 
        $title = "Actualizar producto";
        include_once("../includes/head.php"); 
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <?php 
                        if($loading) {
                            echo "<label style='font-size: 5em'>CARGANDO...</label>";
                        }
                    ?>
                    <div class="form-container d-flex flex-col">
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Editar Producto</h2>
                            <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                        </header>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" class="form d-flex flex-col">
                            <div class="input <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                                <span class="help-block"><?php echo $nombre_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($stock_err)) ? 'has-error' : ''; ?>">
                                <label>Stock</label>
                                <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>">
                                <span class="help-block"><?php echo $stock_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                                <span class="help-block"><?php echo $precio_err;?></span>
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $productId; ?>"/>
                            <!-- <div class="input">
                                <label>Imagenes</label>
                                <input type="file" multiple name="imagenes" class="form-control">
                                <span class="help-block"></span>
                            </div>
                            <div class="d-flex flex-col">
                                <span>Vista previa</span>
                                <ul class="d-flex align-center flex-wrap">
                                    <li class="d-flex flex-col align-center">
                                        <img src="#" alt="" style="width: 10em; height: 10em; background-color: gray">
                                    </li>
                                </ul>
                            </div> -->
                            <footer class="d-flex justify-end">
                                <input type="submit" class="btn btn-success" value="Confirmar">
                                <a href="productos.php" class="btn btn-error">Cancelar</a>
                            </footer>
                        </form>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>