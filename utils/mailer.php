<?php
    
    use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = "smtp.hostinger.com";
        $mail->SMTPAuth = true;
        $mail->Username = "no-reply@digitalredlimit.com";
        $mail->Password = "Perte1234$";
        $mail->SMTPSecure = "PHPMailer:ENCRYPTION_SMTPS";
        $mail->Port = 465;
    
        $mail->setFrom("no-reply@digitalredlimit.com", "Contacto");
        $mail->addAddress("contacto@digitalredlimit.com", "Digital Red Limit");
    
        $mail->Subject = "Formulario de contacto";
        $mail->Body = "Hola!";
    
        $mail-> send();
    
        $respuesta = 'Se ha enviado correctamente!';
    } catch (Exception $e) {
        $respuesta = "Mensaje " . $mail->ErrorInfo;
    }
?>