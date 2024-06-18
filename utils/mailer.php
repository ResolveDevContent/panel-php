<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require "../panel-php/PHPMailer/src/PHPMailer.php";
    require "../panel-php/PHPMailer/src/Exception.php";
    require "../panel-php/PHPMailer/src/SMTP.php";

    if($cotiza) {
        $msg = `De: $nombre
                Asunto: Cotización
                Datos:"
                Nombre y apellido: $nombre 
                Teléfono: $telefono
                Empresa: $empresa
                Descripcion de empresa: $descripcion
                Pais: $pais
                Cotización: $cotizacion
        `;
    } else if($contacto) {
        $msg = `De: $nombre $email
                Asunto: $asunto
                "Mensaje: $mensaje 
        `;
    } else if($agendar) {
        $msg = `De: $nombre $email
                Asunto: Agendar reunion
                Datos:
                Nombre y apellido: $nombre
                Teléfono: $telefono
                Empresa: " . $empresa
                Descripcion de empresa: $descripcion
                Pais: $pais
                Cotización: $cotizacion
                Dia: $dia
                Horario: $horario
        `;
    } else if($unete){
        $msg = `De: $nombre $email
                Asunto: Trabajá con nosotros
                Datos:
                Nombre y apellido: $nombre
                Correo electrónico: $email
                Teléfono: $telefono
                Pais: $pais
                Puesto: $puesto
        `;
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