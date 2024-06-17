<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require "../panel-php/PHPMailer/src/PHPMailer.php";
    require "../panel-php/PHPMailer/src/Exception.php";
    require "../panel-php/PHPMailer/src/SMTP.php";

    if($cotiza) {

    } else if($contacto) {
        $msg = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msg .= "Asunto: $asunto<br><br>";
        $msg .= "Mensaje:";
        $msg .= "<p>" . $mensaje . "</p><br>";
        $msg .= "--<p>Este mensaje fue enviado a trav&eacute;s de un formulario de contacto.</p>--";
    } else if($agendar) {

    } else if($unete){
        $msg = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msg .= "Asunto: Trabajá con nosotros<br><br>";
        $msg .= "Datos:";
        $msg .= "<p>Nombre y apellido:" . $nombre . "</p><br>";
        $msg .= "<p>Correo electrónico:" . $email . "</p><br>";
        $msg .= "<p>Teléfono:" . $telefono . "</p><br>";
        $msg .= "<p>Puesto:" . $puesto . "</p><br>";
        $msg .= "--<p>Este mensaje fue enviado a trav&eacute;s de un formulario de contacto.</p>--";
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

        $mail->isHTML(true);
        $mail->Subject = "Formulario de contacto";
        $mail->Body = $msg;
        $mail->CharSet = 'UTF-8';
    
        $mail-> send();
    
        $respuesta = 'Se ha enviado correctamente!';
    } catch (Exception $e) {
        $respuesta = "Mensaje " . $mail->ErrorInfo;
    }
?>