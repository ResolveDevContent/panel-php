<?php
    // Process delete operation after confirmation
    if(isset($_POST[$id]) && !empty($_POST[$id])){
        // Include config file
        require_once "../config.php";
        
        // Prepare a delete statement
        $sql_images = "DELETE FROM proyectos_images WHERE proyectoId = ?";
        $sql = "DELETE FROM $table WHERE $id = ?";
        
        if($isInProduct) {
            if($stmt_images = mysqli_prepare($link, $sql_images)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt_images, "i", $parametro_id);
                
                // Set parameters
                $parametro_id = trim($_POST[$id]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt_images)){
                    // Records deleted successfully. Redirect to landing page
                    echo "Borradas las imagenes";
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt_images);
        }
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = trim($_POST[$id]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records deleted successfully. Redirect to landing page
                header("location: $location");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else{
        // Check existence of id parameter
        if(empty(trim($_GET[$id]))){
            // URL doesn't contain id parameter. Redirect to error page
            header("location: ../index.php");
            exit();
        }
    }
?>