<?php
// config.php - Compatible con XAMPP local y Railway.app

// Detectar si estamos en Railway (Railway define RAILWAY env var)
if (getenv('RAILWAY_ENVIRONMENT')) {
    // Entorno Railway: usar variables de entorno
    $host = $_ENV['DB_HOST'] ?? 'localhost';
    $dbname = $_ENV['DB_NAME'] ?? 'railway';
    $username = $_ENV['DB_USER'] ?? 'root';
    $password = $_ENV['DB_PASSWORD'] ?? '';
} else {
    // Entorno local (XAMPP): usar credenciales fijas
    $host = '127.0.0.1';
    $dbname = 'crm_aduanas';  // o 'gltcomex_crm' según tu BD
    $username = 'root';
    $password = ''; // XAMPP no tiene contraseña por defecto
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>