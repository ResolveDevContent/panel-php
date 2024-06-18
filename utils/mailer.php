<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require "../panel-php/PHPMailer/src/PHPMailer.php";
    require "../panel-php/PHPMailer/src/Exception.php";
    require "../panel-php/PHPMailer/src/SMTP.php";

    if($cotiza) {
        $msg = "De: $nombre";
        $msg .= "Asunto: Cotización";
        $msg .= "Datos:";
        $msg .= "Nombre y apellido: " . $nombre . "";
        $msg .= "Teléfono: " . $telefono . "";
        $msg .= "Empresa: " . $empresa . "";
        $msg .= "Descripcion de empresa: " . $descripcion . "";
        $msg .= "Pais: " . $pais . "";
        $msg .= "Cotización: " . $cotizacion . "";
        $msg .= "Este mensaje fue enviado a trav&eacute;s de un formulario de contacto.";
    } else if($contacto) {
        $msg = "De: $nombre $email";
        $msg .= "Asunto: $asunto";
        $msg .= "Mensaje:";
        $msg .= " . $mensaje . ";
        $msg .= "Este mensaje fue enviado a trav&eacute;s de un formulario de contacto.";
    } else if($agendar) {
        $msg = "De: $nombre $email";
        $msg .= "Asunto: Agendar reunion";
        $msg .= "Datos:";
        $msg .= "Nombre y apellido: " . $nombre . "";
        $msg .= "Teléfono: " . $telefono . "";
        $msg .= "Empresa: " . $empresa . "";
        $msg .= "Descripcion de empresa: " . $descripcion . "";
        $msg .= "Pais: " . $pais . "";
        $msg .= "Cotización: " . $cotizacion . "";
        $msg .= "Dia: " . $dia . "";
        $msg .= "Horario: " . $horario . "";
        $msg .= "Este mensaje fue enviado a trav&eacute;s de un formulario de contacto.";
    } else if($unete){
        $msg = "De: $nombre $email";
        $msg .= "Asunto: Trabajá con nosotros";
        $msg .= "Datos:";
        $msg .= "Nombre y apellido: " . $nombre . "";
        $msg .= "Correo electrónico: " . $email . "";
        $msg .= "Teléfono: " . $telefono . "";
        $msg .= "Pais: " . $pais . "";
        $msg .= "Puesto: " . $puesto . "";
        $msg .= "Este mensaje fue enviado a trav&eacute;s de un formulario de contacto.";
    }

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
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
    } catch (Exception $e) {
        $respuesta = "Mensaje " . $mail->ErrorInfo;
    }
?>