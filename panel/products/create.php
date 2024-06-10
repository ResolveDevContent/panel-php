<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
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
                header("location: error.php");
                exit();
			}
			closedir($dir); //Cerramos el directorio de destino
		}
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($stock_err) && empty($precio_err)){

        $sql_products = "INSERT INTO products (nombre, stock, precio) VALUES (?, ?, ?)";
        $sql_images = "INSERT INTO products_images (productId, imagen) VALUES (?, ?)";
        $sql_lastId = "SELECT LAST_INSERT_ID() as productId";

        if($stmt_products = mysqli_prepare($link, $sql_products)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_products, "sss", $param_nombre, $param_stock, $param_precio);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_stock = $stock;
            $param_precio = $precio;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt_products)){
                echo "Subido crrectametene";
            } else{
                header("location: error.php");
                exit();
            }
        }
        // Close statement
        mysqli_stmt_close($stmt_products);
    
        $num_imagenes = count($imagenes);
   
        // Prepare an insert statement     
        if($stmt_lastId = mysqli_prepare($link, $sql_lastId)) {
            if(mysqli_stmt_execute($stmt_lastId)) {
                $result = mysqli_stmt_get_result($stmt_lastId);
                $row = mysqli_fetch_array($result);
                $productId = $row['productId'];

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
                            echo "Agregado corretamente!";
                        } else{
                            header("location: error.php");
                            exit();
                        }
                    }
                }

                header("location: productos.php");
                exit();
            }

            // Close statement
            mysqli_stmt_close($stmt_images); 
            mysqli_stmt_close($stmt_lastId); 
        }
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
                        <a href="productos.php">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Agregar Producto</h2>
                            <p>Completar el siguiente formulario para agregar un producto</p>
                        </header>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col" id="form-create">
                            <div class="input <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
                                <span class="help-block"><?php echo $nombre_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($stock_err)) ? 'has-error' : ''; ?>">
                                <label>Stock</label>
                                <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" required>
                                <span class="help-block" ><?php echo $stock_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($precio_err)) ? 'has-error' : ''; ?>">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>" required>
                                <span class="help-block"><?php echo $precio_err;?></span>
                            </div>
                            <div class="input">
                                <label>imagen</label>
                                <input type="file" multiple name="imagenes[]" class="form-control" required>
                                <span class="help-block"></span>
                            </div>
                            <div class="d-flex flex-col">
                                <span>Vista previa</span>
                            </div>
                            <footer class="d-flex justify-end">
                                <input type="submit" class="btn btn-success" data-btnSubmit value="Confirmar">
                                <a href="productos.php" class="btn btn-error">Cancelar</a>
                            </footer>
                        </form>
                    </div>
                </div>
                <div class="background disabled" data-loader>
                    <div class="loader-container d-flex justify-center">
                        <div class="loader"></div>    
                    </div>
                </div>
            </article>
        </section>
    </body>

    <script>
        const btnSubmit  = document.querySelector("[data-btnSubmit]");
        const formCreate = document.querySelector("#form-create");

        btnSubmit.addEventListener('click', () => {
            const loader = document.querySelector("[data-loader]");

            const formData = new FormData(formCreate);
            
            let flag = true;
            for (const value of formData.values()) {
                if(value == "" || value.size == 0) {
                    flag = false;
                }
            }
                
            if(flag) {
                loader.classList.remove('disabled');
            }
        });
    </script>
</html>