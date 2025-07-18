<?php
require_once 'config.php';

$mensaje = "";

// Conexión PDO
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$institutos = [];
try {
    $stmt = $pdo->query("SELECT codigo_sede, nombre_completo FROM sedes ORDER BY nombre_completo ASC");
    $institutos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $mensaje = "Error al cargar sedes: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = strtoupper(trim($_POST["nombre"] ?? ''));
    $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];

    try {
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
