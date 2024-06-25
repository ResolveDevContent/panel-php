<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
// Define variables and initialize with empty values
$nombre = $descripcion = $servicios = $instagram = $website = $facebook = $mail = "";
$nombre_err = $portada_err = $descripcion_err = $servicios_err = $instagram_err = $website_err = $facebook_err = $mail_err = "";
$portada = "";
$imagenes = [];
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese el nombre.";
    } else{
        $nombre = $input_nombre;
    }
    
    // Validate salary
    $input_servicios = trim($_POST["servicios"]);
    if(empty($input_servicios)){
        $servicios_err = "Por favor ingrese un servicio";
    } else{
        $servicios = $input_servicios;
    }

    $input_descripcion = trim($_POST["descripcion"]);
    $input_website = trim($_POST["website"]);
    $input_instagram = trim($_POST["instagram"]);
    $input_facebook = trim($_POST["facebook"]);
    $input_mail = trim($_POST["mail"]);
    $descripcion = $input_descripcion;
    $website = $input_website;
    $instagram = $input_instagram;
    $facebook = $input_facebook;
    $mail = $input_mail;

    // // Validate imagen
    if($_FILES["portada"]["name"]) {
        $filename = $_FILES["portada"]["name"]; //Obtenemos el nombre original del archivo
        $source = $_FILES["portada"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
        
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
            $portada = $target_path;
        } else {	
            header("location: error.php");
            exit();
        }
        closedir($dir); //Cerramos el directorio de destino
    }

    foreach($_FILES['imagenes']['tmp_name'] as $item => $tmp_name) {
        if($_FILES["imagenes"]["name"][$item]) {
			$filename2 = $_FILES["imagenes"]["name"][$item]; //Obtenemos el nombre original del archivo
			$source2 = $_FILES["imagenes"]["tmp_name"][$item]; //Obtenemos un nombre temporal del archivo
			
			$directorio2 = 'imagenes/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio2)){
				mkdir($directorio2, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir2=opendir($directorio2); //Abrimos el directorio de destino
			$target_path2 = $directorio2.'/'.$filename2; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source2, $target_path2)) {	
				echo "El archivo $filename2 se ha almacenado en forma exitosa.<br>";
                array_push($imagenes, $target_path2);
            } else {	
                header("location: error.php");
                exit();
			}
			closedir($dir2); //Cerramos el directorio de destino
		}
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($stock_err) && empty($precio_err)){
        // Prepare an update statement
        $sql = "UPDATE proyectos SET nombre=?, descripcion=?, portada=?, servicios=?, instagram=?, website=?, facebook=?, mail=? WHERE id=?";
        $sql_images = "INSERT INTO proyectos_images (proyectoId, imagen) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssi", $param_nombre, $param_descripcion, $param_portada, $param_servicios, $param_instagram, $param_website, $param_facebook, $param_mail, $param_id);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_descripcion = $descripcion;
            $param_portada = $portada;
            $param_servicios = $servicios;
            $param_instagram = $instagram;
            $param_facebook = $facebook;
            $param_website = $website;
            $param_mail = $mail;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                echo "Subido correctamente";
            } else{
                header("location: error.php");
                exit();
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    $num_imagenes = count($imagenes);
    // Prepare an insert statement     

    echo $num_imagenes;
    $id = trim($_GET["id"]);
    for($i = 0; $i < $num_imagenes; $i++) {
        if($stmt_images = mysqli_prepare($link, $sql_images)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_images, "ss", $param_id, $param_imagenes);
                
            // Set parameters
            $param_id = $id;
            $param_imagenes = $imagenes[$i];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt_images)){
                // Records created successfully. Redirect to landing page
                echo "Editado corretamente!";
            } else{
                header("location: error.php");
                exit();
            }
        }
    }

    header("location: proyectos.php");
    // Close statement
    mysqli_stmt_close($stmt_images); 
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM proyectos WHERE id = ?";
        $sql2 = "SELECT * FROM proyectos_images WHERE proyectoId = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nombre = $row["nombre"];
                    $descripcion = $row["descripcion"];
                    $servicios = json_decode($row["servicios"]);
                    $instagram = $row["instagram"];
                    $facebook = $row["facebook"];
                    $website = $row["website"];
                    $mail = $row["mail"];
                    $portada = $row["portada"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                header("location: error.php");
                exit();
            }
        }

        if($stmt2 = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt2, "i", $param_id);
    
            // Set parameters
            $param_id = trim($_GET["id"]);
    
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt2)){
                $result2 = mysqli_stmt_get_result($stmt2);
            } else{
                header("location: error.php");
                exit();
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        echo 'tira error aca7!?';
        // header("location: error.php");
        // exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">

    <?php 
        $title = "Actualizar proyecto";
        include_once("../includes/head.php"); 
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="proyectos.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Editar Proyecto</h2>
                            <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                        </header>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col">
                            <div class="input">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                            </div>
                            <div class="input">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
                            </div>
                            <div class="input">
                                <label>Servicios</label>
                                <ul class="d-flex align-center flex-wrap">
                                    <?php 
                                        foreach($servicios->servicios as $servicio => $value) {
                                            echo '<li><span class="toast">' . $value->nombre . '</span></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="input">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="<?php echo $instagram; ?>">
                            </div>
                            <div class="input">
                                <label>Website</label>
                                <input type="text" name="website" class="form-control" value="<?php echo $website; ?>">
                            </div>
                            <div class="input">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="<?php echo $facebook; ?>">
                            </div>
                            <div class="input">
                                <label>Mail</label>
                                <input type="text" name="mail" class="form-control" value="<?php echo $mail; ?>">
                            </div>
                            <div class="input">
                                <label>Portada</label>
                                <figure>
                                    <img src="<?php echo $portada; ?>" alt=''>
                                </figure>
                            </div>
                            <div class="d-flex flex-col imagenes">
                                <span>Imagenes</span>
                                <ul class="d-flex align-center flex-wrap">
                                    <?php
                                        while($row = mysqli_fetch_array($result2)){
                                            echo "<li class='d-flex flex-col align-center justify-center'><figure><img src='{$row["imagen"]}' alt=''></figure></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <footer class="d-flex justify-end">
                                <input type="submit" class="btn btn-success" value="Confirmar" data-btnSubmit>
                                <a href="proyectos.php" class="btn btn-error">Cancelar</a>
                            </footer>
                        </form>
                    </div>
                </div>
                <div class="background d-flex align-center justify-center disabled" data-loader>
                    <div class="loader-container d-flex justify-center">
                        <div class="loader"></div>    
                    </div>
                </div>
            </article>
        </section>
    </body>

    <script>
        updateList = function(input, output) {
            let children = "";
            for (var i = 0; i < input.files.length; ++i) {
                children +=  '<li>'+ input.files.item(i).name + '<span class="remove-list" onclick="return this.parentNode.remove()">X</span>' + '</li>'
            }
            output.innerHTML = children;
        }

        // ------------------------------------------------------------------------------

        const input = document.querySelector('#file');
        const output = document.querySelector('#fileList');

        input.addEventListener("change", function(evt) {
            updateList(input, output)
        })
        
        const btnSubmit = document.querySelector("[data-btnSubmit]");
        const formCreate = document.querySelector("#form-create");

        btnSubmit.addEventListener('click', () => {
            const loader = document.querySelector("[data-loader]");

            const formData = new FormData(formCreate);
            
            let flag = true;
            for (const value of formData.values()) {
                if(value == "") {
                    flag = false;
                }
            }
                
            if(flag) {
                loader.classList.remove('disabled');
            }
        });
    </script>
</html>