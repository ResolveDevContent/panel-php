<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$nombre = $stock = $precio = "";
$nombre_err = $stock_err = $precio_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese el nombre del producto.";
    } elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_err = "Por favor ingrese un nombre válido.";
    } else{
        $nombre = $input_nombre;
    }
    
    // Validate address
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
        $precio_err = "Por favor ingrese un valor correcto y positivo.";
    } else{
        $precio = $input_precio;
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($stock_err) && empty($precio_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (nombre, stock, precio) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_stock, $param_precio);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_stock = $stock;
            $param_precio = $precio;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
}
?>
 
<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Crear producto";
    include_once("../includes/head.php"); 
?>

<body>
    <section class="d-flex">
        <?php include_once("../includes/menu.php"); ?>
        <article id="container">
            <div class="wrapper d-flex flex-col">
                <header class="d-flex flex-col align-center justify-center text-center">
                    <h2>Agregar Producto</h2>
                    <p>Completar el siguiente formulario para agregar un producto</p>
                </header>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form d-flex flex-col">
                    <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        <span class="help-block"><?php echo $nombre_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($stock_err)) ? 'has-error' : ''; ?>">
                        <label>Stock</label>
                        <textarea name="stock" class="form-control"><?php echo $stock; ?></textarea>
                        <span class="help-block"><?php echo $stock_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>">
                        <label>Precio</label>
                        <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                        <span class="help-block"><?php echo $precio_err;?></span>
                    </div>
                    <input type="submit" class="btn" value="Submit">
                    <a href="productos.php" class="btn">Cancelar</a>
                </form>
            </div>
        </article>
    </section>
</body>
</html>