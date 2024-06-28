<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require "../panel-php/PHPMailer/src/PHPMailer.php";
    require "../panel-php/PHPMailer/src/Exception.php";
    require "../panel-php/PHPMailer/src/SMTP.php";

    $msg = '';
    if($cotiza) {
        $msg = "De: $nombre <br>";
        $msg .= "Asunto: Cotización <br><br>";
        $msg .= "Datos: <br>";
        $msg .= "Nombre y apellido: " . $nombre . "<br>";
        $msg .= "Teléfono: " . $telefono . "<br>";
        $msg .= "Empresa: " . $empresa . "<br>";
        $msg .= "Descripcion de empresa: " . $descripcion . "<br>";
        $msg .= "Pais: " . $pais . "<br>";
        $msg .= "Cotización: " . $cotizacion . "<br><br>";
        $msg .= "Este mensaje fue enviado a traves de un formulario de contacto.";
    } else if($contacto) {
        $msg = "De: $nombre $email <br>";
        $msg .= "Asunto: $asunto <br><br>";
        $msg .= "Mensaje: <br>";
        $msg .= " . $mensaje . <br>";
        $msg .= "Este mensaje fue enviado a traves de un formulario de contacto.";
    } else if($agendar) {
        $msg = "De: $nombre <br>";
        $msg .= "Asunto: Agendar reunion <br><br>";
        $msg .= "Datos: <br>";
        $msg .= "Nombre y apellido: " . $nombre . "<br>";
        $msg .= "Teléfono: " . $telefono . "<br>";
        $msg .= "Empresa: " . $empresa . "<br>";
        $msg .= "Descripcion de empresa: " . $descripcion . "<br>";
        $msg .= "Pais: " . $pais . "<br>";
        $msg .= "Cotización: " . $cotizacion . "<br>";
        $msg .= "Dia: " . $dia . "<br>";
        $msg .= "Horario: " . $horario . "<br><br>";
        $msg .= "Este mensaje fue enviado a traves de un formulario de contacto.";
    } else if($unete){
        $msg = "De: $nombre $email <br>";
        $msg .= "Asunto: Trabajá con nosotros <br><br>";
        $msg .= "Datos: <br>";
        $msg .= "Nombre y apellido: " . $nombre . " <br>";
        $msg .= "Correo electrónico: " . $email . " <br>";
        $msg .= "Teléfono: " . $telefono . " <br>";
        $msg .= "Pais: " . $pais . " <br>";
        $msg .= "Puesto: " . $puesto . " <br><br>";
        $msg .= "Este mensaje fue enviado a traves de un formulario de contacto.";
    }

    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->Host = "smtp.hostinger.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Username = "no-reply@digitalredlimit.com";
        $mail->Password = "Perte1234$";

        if($unete) {
            $mail->addAttachment($cv);
        }
    
        $mail->setFrom("no-reply@digitalredlimit.com", "Contacto");
        $mail->addAddress("contacto@digitalredlimit.com");

        $mail->Subject = "Formulario de contacto";
        $mail->Body = $msg;
    
        $mail-> send();
    
        $respuesta = 'Se ha enviado correctamente!';

        if($agendar) {
            $respuesta = '¡Gracias por agendar tu reunión con Red Limit! 📅
                          Hemos recibido tus preferencias de día y hora. Nuestro equipo se pondrá en contacto contigo pronto para confirmar los detalles de la reunión y ofrecerte un horario personalizado.
                          Estamos ansiosos por conocerte y explorar cómo podemos ayudarte a alcanzar tus objetivos de marketing digital. 🚀';
        }
        
        $send = true;
    } catch (Exception $e) {
        $respuesta = "Mensaje " . $mail->ErrorInfo;
        $send = true;
    }
?>