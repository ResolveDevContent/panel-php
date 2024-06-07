<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
// Define variables and initialize with empty values
$nombre = $stock = $precio = "";
$nombre_err = $stock_err = $precio_err = $imagenes_err = "";
$imagenes = [];
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

    // Validate imagen
    foreach($_FILES['imagenes']['tmp_name'] as $item => $tmp_name) {
        if($_FILES["imagenes"]["name"][$item]) {
            $filename = $_FILES["imagenes"]["name"][$item]; //Obtenemos el nombre original del archivo
            $source = $_FILES["imagenes"]["tmp_name"][$item]; //Obtenemos un nombre temporal del archivo
            
            $directorio = 'imagenes/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) {	
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                array_push($imagenes, $target_path);
            } else {	
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino
        }
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($stock_err) && empty($precio_err)){
        // Prepare an update statement
        $sql = "UPDATE products SET nombre=?, stock=?, precio=? WHERE productId=?";
        $sql_images = "INSERT INTO products_images (productId, imagen) VALUES (?, ?)";
         
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
                echo "Subido correctamente";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    $num_imagenes = count($imagenes);
    // Prepare an insert statement     

    echo $num_imagenes;
    $productId = trim($_GET["productId"]);
    for($i = 0; $i < $num_imagenes; $i++) {
        if($stmt_images = mysqli_prepare($link, $sql_images)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_images, "ss", $param_productId, $param_imagenes);
                
            // Set parameters
            $param_productId = $productId;
            $param_imagenes = $imagenes[$i];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt_images)){
                // Records created successfully. Redirect to landing page
                echo "Editado corretamente!";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }

    header("location: productos.php");
    // Close statement
    mysqli_stmt_close($stmt_images); 
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["productId"]) && !empty(trim($_GET["productId"]))){
        // Get URL parameter
        $productId =  trim($_GET["productId"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE productId = ?";
        $sql2 = "SELECT * FROM products_images WHERE productId = ?";

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

        if($stmt2 = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt2, "i", $param_productId);
    
            // Set parameters
            $param_productId = trim($_GET["productId"]);
    
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt2)){
                $result2 = mysqli_stmt_get_result($stmt2);
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
                    <div class="form-container d-flex flex-col">
                        <a href="productos.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#fff">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                            </svg>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Editar Producto</h2>
                            <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                        </header>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col">
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
                            <div class="input">
                                <label>Imagenes</label>
                                <input type="file" multiple name="imagenes[]" class="form-control">
                                <span class="help-block"></span>
                            </div>
                            <div class="d-flex flex-col imagenes">
                                <span>Imagenes</span>
                                <ul class="d-flex align-center flex-wrap">
                                    <?php
                                        while($row = mysqli_fetch_array($result2)){
                                            echo "<li class='d-flex flex-col align-center justify-center'><figure><img src='{$row["imagen"]}' alt='' width='200px' height='200px'></figure><a href='deleteImagen.php?imagenId=". $row['imagenId'] ."&productId=". $row['productId'] ."' title='Borrar'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: rgba(0, 0, 0, 1);transform: ;msFilter:;'><path d='M15 2H9c-1.103 0-2 .897-2 2v2H3v2h2v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h2V6h-4V4c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm8 16H7V8h10v12z'></path></svg></a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <input type="hidden" name="productId" value="<?php echo $productId; ?>"/>
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