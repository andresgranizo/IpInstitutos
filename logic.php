<?php
require_once 'config.php';

$mensaje = "";
if (isset($_GET['popup']) && $_GET['popup'] === 'ok') {
    $mensaje = "Instituto registrado correctamente.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = strtoupper(trim($_POST["nombre"] ?? ''));
    $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];

    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO institutos (nombre, ip_registro) VALUES (:nombre, :ip)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':ip' => $ip
        ]);

        header("Location: index.php?popup=ok");
        exit;
    } catch (PDOException $e) {
        $mensaje = "Error al guardar: " . $e->getMessage();
    }
}
?>
