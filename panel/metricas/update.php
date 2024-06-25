<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
// Define variables and initialize with empty values
$imagen = "";
$imagen_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate imagen
    if($_FILES["imagen"]["name"]) {
        $filename = $_FILES["imagen"]["name"]; //Obtenemos el nombre original del archivo
        $source = $_FILES["imagen"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
        
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
            $imagen = $target_path;
        } else {	
            header("location: error.php");
            exit();
        }
        closedir($dir); //Cerramos el directorio de destino
    }
    
    // Check input errors before inserting in database
    if(empty($imagen_err)){
        // Prepare an update statement
        $sql = "UPDATE metricas SET imagen=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_imagen, $param_id);
            
            // Set parameters
            $param_imagen = $imagen;
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

    header("location: metricas.php");
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
        $sql = "SELECT * FROM metricas WHERE id = ?";

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
                    $imagen = $row["imagen"];
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
        $title = "Actualizar metrica";
        include_once("../includes/head.php"); 
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="metricas.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Editar Metrica</h2>
                            <p>Edite los valores de entrada y envíe para actualizar el registro.</p>
                        </header>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col">
                            <span>Imagen</span>
                            <div class="custom-file">
                                <label class="custom-file-label d-flex align-center" for="file">
                                    <input type="file" name="imagen" id="file" class="form-control" required>
                                    <i class="icon upload"></i>
                                    <span>Subir imagen</span>
                                </label>
                            </div>
                            <div class="input">
                                <label>Vista previa</label>
                                <figure>
                                    <img src="<?php echo $imagen; ?>" alt=''>
                                </figure>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <footer class="d-flex justify-end">
                                <input type="submit" class="btn btn-success" value="Confirmar" data-btnSubmit>
                                <a href="metricas.php" class="btn btn-error">Cancelar</a>
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