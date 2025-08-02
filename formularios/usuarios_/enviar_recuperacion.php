<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Cambia la ruta si es necesario
include("../Connections/paginalocal.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM snp_user WHERE USE_USER = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $token = bin2hex(random_bytes(32));
        $expira = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $update = $pdo->prepare("UPDATE snp_user SET RESET_TOKEN = :token, RESET_EXPIRATION = :expira WHERE USE_CODI = :id");
        $update->execute([
            ':token' => $token,
            ':expira' => $expira,
            ':id' => $usuario['USE_CODI']
        ]);

        $link = "http://localhost/school2025/admin/restablecer.php?token=$token";

        // Configurar PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'enriquevimac01@gmail.com'; // Cambia por tu correo
            $mail->Password = 'zyhp bmww rjop wthh'; // Contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Detalles del correo
            $mail->setFrom('enriquevimac01@gmail.com', 'CSN School');
            $mail->addAddress($correo, $usuario['USE_APNO'] ?? 'Usuario');
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "Haz clic en este enlace para restablecer tu contraseña:\n\n$link\n\nEste enlace expira en 1 hora.";

            $mail->send();
            echo "Se ha enviado un enlace de recuperación a tu correo.";
        } catch (Exception $e) {
            echo "Error al enviar correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "El correo no está registrado.";
    }
    echo '<br><a class="boton" href="index.php">Volver al login</a>';
    echo '</div></body></html>';
}
?>

