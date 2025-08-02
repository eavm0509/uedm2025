<?php
include("../Connections/paginalocal.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $nuevaClave = $_POST["clave_nueva"];

    $stmt = $pdo->prepare("SELECT * FROM snp_user WHERE RESET_TOKEN = :token AND RESET_EXPIRA > NOW()");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        $pdo->prepare("UPDATE snp_user SET USE_CLAV = :clave, RESET_TOKEN = NULL, RESET_EXPIRA = NULL WHERE USE_ID = :id")
            ->execute([
                ":clave" => $nuevaClave, // RECOMIENDO HASHEAR
                ":id" => $user["USE_ID"]
            ]);

        echo "Contraseña actualizada correctamente.";
    } else {
        echo "Token inválido.";
    }
}
?>
