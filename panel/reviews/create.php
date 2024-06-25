<?php
// Include config file
require_once "../config.php";
// require_once "../errors.php";
 
// Define variables and initialize with empty values
$avatar = $nombre = $texto = $empresa = $estrellas = "";
$avatar_err = $nombre_err = $texto_err = $empresa_err = $estrellas_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_nombre = trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombre_err = "Por favor ingrese el nombre.";
    } else{
        $nombre = $input_nombre;
    }

    // Validate salary
    $input_texto = trim($_POST["texto"]);
    if(empty($input_texto)){
        $texto_err = "Por favor ingrese un texto";
    } else{
        $texto = $input_texto;
    }

    // Validate salary
    $input_estrellas = trim($_POST["estrellas"]);
    if(empty($input_estrellas)){
        $estrellas_err = "Por favor ingrese estrellas";
    } else{
        $estrellas = $input_estrellas;
    }

    $input_empresa = trim($_POST["empresa"]);
    $empresa = $input_empresa;

    // Validate imagen
    if($_FILES["avatar"]["name"]) {
        $filename = $_FILES["avatar"]["name"]; //Obtenemos el nombre original del archivo
        $source = $_FILES["avatar"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
        
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
            $avatar = $target_path;
        } else {	
            header("location: error.php");
            exit();
        }
        closedir($dir); //Cerramos el directorio de destino
    }
    
    // Check input errors before inserting in database
    if(empty($avatar_err) && empty($nombre_err) && empty($texto_err) && empty($estrellas_err)){

        $sql_products = "INSERT INTO reviews (avatar, nombre, texto, empresa, estrellas) VALUES (?, ?, ?, ?, ?)";

        if($stmt_products = mysqli_prepare($link, $sql_products)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_products, "sssss", $param_avatar, $param_nombre, $param_texto, $param_empresa, $param_estrellas);
            
            // Set parameters
            $param_avatar = $avatar;
            $param_nombre = $nombre;
            $param_texto = $texto;
            $param_empresa = $empresa;
            $param_estrellas = $estrellas;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt_products)){
                header("location: reviews.php");
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
        $title = "Crear Testimonio";
        include_once("../includes/head.php"); 
    ?>

    <body>
        <section class="d-flex">
            <?php include_once("../includes/menu.php"); ?>
            <article id="container">
                <div class="wrapper">
                    <div class="form-container d-flex flex-col">
                        <a href="reviews.php" class="d-flex align-center">
                            <i class="icon left-arrow"></i>
                            <span>Volver</span>
                        </a>
                        <header class="d-flex flex-col align-center justify-center text-center">
                            <h2>Agregar testimonio</h2>
                            <p>Completar el siguiente formulario para agregar un testimonio</p>
                        </header>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form d-flex flex-col" id="form-create">
                            <div class="input <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
                                <span class="help-block" ><?php echo $nombre_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($texto_err)) ? 'has-error' : ''; ?>">
                                <label>Texto</label>
                                <input type="text" name="texto" class="form-control" value="<?php echo $texto; ?>" required>
                                <span class="help-block" ><?php echo $texto_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($empresa_err)) ? 'has-error' : ''; ?>">
                                <label>Empresa</label>
                                <input type="text" name="empresa" class="form-control" value="<?php echo $empresa; ?>" required>
                                <span class="help-block" ><?php echo $empresa_err;?></span>
                            </div>
                            <div class="input <?php echo (!empty($estrellas_err)) ? 'has-error' : ''; ?>">
                                <label>Estrellas</label>
                                <input type="number" name="estrellas" class="form-control" value="<?php echo $estrellas; ?>" required>
                                <span class="help-block" ><?php echo $estrellas_err;?></span>
                            </div>
                            <span>Avatar</span>
                            <div class="custom-file">
                                <label class="custom-file-label d-flex align-center" for="file">
                                    <input type="file" name="avatar" id="file" class="form-control" required>
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