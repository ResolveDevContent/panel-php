<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
// Define variables and initialize with empty values
$imagen = "";
$imagen_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

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

        $sql_products = "INSERT INTO metricas (imagen) VALUES (?)";

        if($stmt_products = mysqli_prepare($link, $sql_products)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_products, "s", $param_imagen);
            
            // Set parameters
            $param_imagen = $imagen;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt_products)){
                header("location: metricas.php");
            } else{
                header("location: error.php");
                exit();
            }
        }
        // Close statement
        mysqli_stmt_close($stmt_products);
        // Prepare an insert statement     
    }

    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "Crear Metrica";
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
                            <h2>Agregar metrica</h2>
                            <p>Completar el siguiente formulario para agregar un metrica</p>
                        </header>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col" id="form-create">
                            <span>Imagen</span>
                            <div class="custom-file">
                                <label class="custom-file-label d-flex align-center" for="file">
                                    <input type="file" name="imagen" id="file" class="form-control" required>
                                    <i class="icon upload"></i>
                                    <span>Subir imagen</span>
                                </label>
                            </div>
                            <ul id="fileList" class="file-list"></ul>
                            <footer class="d-flex justify-end">
                                <input type="submit" class="btn btn-success" data-btnSubmit value="Confirmar">
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