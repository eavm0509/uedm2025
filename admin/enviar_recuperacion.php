<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor_eavm/autoload.php';
include("../Connections/paginalocal.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM snp_user WHERE USE_USER = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Generar token y fecha de expiración
        $token = bin2hex(random_bytes(32));
        $expira = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Guardar token en base de datos
        $update = $pdo->prepare("UPDATE snp_user SET RESET_TOKEN = :token, RESET_EXPIRATION = :expira WHERE USE_CODI = :id");
        $update->execute([
            ':token' => $token,
            ':expira' => $expira,
            ':id' => $usuario['USE_CODI']
        ]);

        // Enlace de recuperación
        $link = "http://school.ec/uedm2025/admin/restablecer.php?token=$token";

        // Configurar PHPMailer usando mail()
        $mail = new PHPMailer(true);

        try {
            // NO usar SMTP
            $mail->isMail(); // Usa función mail() de PHP

            // Remitente y destinatario
            $mail->setFrom('compusoftnet@school.ec', 'CSN School');
            $mail->addAddress($correo, $usuario['USE_APNO'] ?? 'Usuario');
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "Hola {$usuario['USE_APNO']},\n\nHaz clic en el siguiente enlace para restablecer tu contraseña:\n\n$link\n\nEste enlace expira en 1 hora.\n\nSi no solicitaste este cambio, ignora este mensaje.";

            // Enviar correo
            $mail->send();
            echo "Se ha enviado un enlace de recuperación a tu correo.";
        } catch (Exception $e) {
            echo "Error al enviar correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "El correo no está registrado.";
    }

    echo '<br><a class="boton" href="index.php">Volver al login</a>';
}
?>
