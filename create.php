<?php
// Include config file
require_once "config.php";
 
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
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Agregar Producto</h2>
                    </div>
                    <p>Favor diligenciar el siguiente formulario, para agregar el producto.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>