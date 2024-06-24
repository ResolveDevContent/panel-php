<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
// Define variables and initialize with empty values
$nombre = $descripcion = $servicios = $instagram = $website = $facebook = $mail = "";
$nombre_err = $portada_err = $descripcion_err = $servicios_err = $instagram_err = $website_err = $facebook_err = $mail_err = "";
$portada = "EJEMPLO";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    // if($_FILES["portada"]["name"]) {
    //     $filename = $_FILES["portada"]["name"]; //Obtenemos el nombre original del archivo
    //     $source = $_FILES["portada"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
        
    //     $directorio = 'imagenes/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
        
    //     //Validamos si la ruta de destino existe, en caso de no existir la creamos
    //     if(!file_exists($directorio)){
    //         mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
    //     }
        
    //     $dir=opendir($directorio); //Abrimos el directorio de destino
    //     $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
        
    //     //Movemos y validamos que el archivo se haya cargado correctamente
    //     //El primer campo es el origen y el segundo el destino
    //     if(move_uploaded_file($source, $target_path)) {	
    //         echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
    //         $portada = $target_path;
    //     } else {	
    //         header("location: error.php");
    //         exit();
    //     }
    //     closedir($dir); //Cerramos el directorio de destino
    // }
    
    // Check input errors before inserting in database
    if(empty($nombre_err) && empty($portada_err) && empty($servicios_err)){

        $sql_products = "INSERT INTO proyectos (nombre, descripcion, portada, servicios, instagram, website, facebook, mail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $sql_images = "INSERT INTO proyectos_images (proyectoId, imagen) VALUES (?, ?)";
        $sql_lastId = "SELECT LAST_INSERT_ID() as proyectoId";

        if($stmt_products = mysqli_prepare($link, $sql_products)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_products, "ssssssss", $param_nombre, $param_descripcion, $param_portada, $param_servicios, $param_instagram, $param_website, $param_facebook, $param_mail);
            
            // Set parameters
            $param_nombre = $nombre;
            $param_descripcion = $descripcion;
            $param_portada = $portada;
            $param_servicios = $servicios;
            $param_instagram = $instagram;
            $param_facebook = $facebook;
            $param_website = $website;
            $param_mail = $mail;
            
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
    
        // Prepare an insert statement     
        if($stmt_lastId = mysqli_prepare($link, $sql_lastId)) {
            if(mysqli_stmt_execute($stmt_lastId)) {
                $result = mysqli_stmt_get_result($stmt_lastId);
                $row = mysqli_fetch_array($result);
                $proyectoId = $row['proyectoId'];

                if($stmt_images = mysqli_prepare($link, $sql_images)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt_images, "ss", $param_proyectoId, $param_portada);
                    
                    // Set parameters
                    $param_proyectoId = $proyectoId;
                    $param_portada = $portada;

                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt_images)){
                        // Records created successfully. Redirect to landing page
                        echo "Agregado corretamente!";
                    } else{
                        header("location: error.php");
                        exit();
                    }
                }

                header("location: proyectos.php");
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
                        <a href="proyectos.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Agregar Proyecto</h2>
                            <p>Completar el siguiente formulario para agregar un proyecto</p>
                        </header>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col" id="form-create">
                            <div class="input <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
                                <span class="help-block"><?php echo $nombre_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($descripcion_err)) ? 'has-error' : ''; ?>">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>" required>
                                <span class="help-block" ><?php echo $descripcion_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($servicios_err)) ? 'has-error' : ''; ?>">
                                <label>Servicios</label>
                                <input type="text" name="servicios" class="form-control" value="<?php echo $servicios; ?>" required>
                                <span class="help-block"><?php echo $servicios_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($instagram_err)) ? 'has-error' : ''; ?>">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="<?php echo $instagram; ?>" required>
                                <span class="help-block"><?php echo $instagram_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($facebook_err)) ? 'has-error' : ''; ?>">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="<?php echo $facebook; ?>" required>
                                <span class="help-block"><?php echo $facebook_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($website_err)) ? 'has-error' : ''; ?>">
                                <label>Website</label>
                                <input type="text" name="website" class="form-control" value="<?php echo $website; ?>" required>
                                <span class="help-block"><?php echo $website_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($mail_err)) ? 'has-error' : ''; ?>">
                                <label>Mail</label>
                                <input type="text" name="mail" class="form-control" value="<?php echo $mail; ?>" required>
                                <span class="help-block"><?php echo $mail_err;?></span>
                            </div>
                            <span>Portada</span>
                            <div class="custom-file">
                                <label class="custom-file-label d-flex align-center" for="file">
                                    <input type="file" name="portada" id="file" class="form-control" required>
                                    <i class="icon upload"></i>
                                    <span>Subir imagenes o videos</span>
                                </label>
                            </div>
                            <ul id="fileList" class="file-list"></ul>
                            <footer class="d-flex justify-end">
                                <input type="submit" class="btn btn-success" data-btnSubmit value="Confirmar">
                                <a href="productos.php" class="btn btn-error">Cancelar</a>
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