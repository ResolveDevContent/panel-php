<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$nombre = $stock = $precio = "";
$nombre_err = $stock_err = $precio_err = $imagenes_err = "";
$imagenes = [];
 
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

        $sql = "INSERT INTO products (nombre, stock, precio) VALUES (?, ?, ?)";
        $sql2 = "INSERT INTO products_images (productId, imagen) VALUES (?, ?)";
        $sql3 = "SELECT LAST_INSERT_ID() as productId";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_stock, $param_precio);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_stock = $stock;
            $param_precio = $precio;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo "Subido crrectametene";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    $num_imagenes = count($imagenes);
    // Prepare an insert statement     
    if($stmt2 = mysqli_prepare($link, $sql3)) {
        if(mysqli_stmt_execute($stmt2)) {
            $result = mysqli_stmt_get_result($stmt2);
            $row = mysqli_fetch_array($result);
            $productId = $row['productId'];
            echo $productId;
            for($i = 0; $i < $num_imagenes; $i++) {
                if($stmt3 = mysqli_prepare($link, $sql2)){

                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt3, "ss", $param_productId, $param_imagenes);
                    
                    // Set parameters
                    $param_productId = $productId;
                    $param_imagenes = $imagenes[$i];
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt3)){
                        // Records created successfully. Redirect to landing page
                        header("location: productos.php");
                        exit();
                    } else{
                        echo "Something went wrong. Please try again later.";
                    }
                }
            }
        }

        // Close statement
        mysqli_stmt_close($stmt3); 
        mysqli_stmt_close($stmt2); 
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
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Agregar Producto</h2>
                            <p>Completar el siguiente formulario para agregar un producto</p>
                        </header>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col">
                            <div class="input <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                                <span class="help-block"><?php echo $nombre_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($stock_err)) ? 'has-error' : ''; ?>">
                                <label>Stock</label>
                                <input type="number" name="stock" class="form-control"><?php echo $stock; ?></input>
                                <span class="help-block"><?php echo $stock_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                                <span class="help-block"><?php echo $precio_err;?></span>
                            </div>
                            <div class="input">
                                <label>imagen</label>
                                <input type="file" multiple name="imagenes[]" class="form-control" >
                                <span class="help-block"></span>
                            </div>
                            <div class="d-flex flex-col">
                                <span>Vista previa</span>
                                <ul class="d-flex align-center flex-wrap">
                                    <li class="d-flex flex-col align-center">
                                        <img src="#" alt="" class="rounded" style="width: 10em; height: 10em; background-color: gray">
                                    </li>
                                </ul>
                            </div>
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