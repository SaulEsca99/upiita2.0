<?php
// includes/conexion.php - Conexión a base de datos
// Configurado para funcionar en IONOS y desarrollo local

// Cargar configuración si no está cargada
if (!defined('BASE_URL')) {
    require_once dirname(__DIR__) . '/config.php';
}

// Detectar entorno
$is_production = $_SERVER['SERVER_NAME'] !== 'localhost';

try {
    if ($is_production) {
        // ==============================================
        // CONFIGURACIÓN PARA IONOS - ACTUALIZA ESTOS DATOS
        // ==============================================
        
        // Opción 1: Conexión por socket (más común en IONOS)
        $host = 'localhost';  // Generalmente localhost en IONOS
        
        // Opción 2: Si IONOS te dio una IP específica, úsala aquí
        // $host = '123.456.789.0';
        
        // Datos de tu base de datos en IONOS
       $host = 'db5018121072.hosting-data.io';
        $db   = 'dbs14382122';
        $user = 'dbu2064690';
        $pass = 'Upiita2024!';  
        $charset = 'utf8mb4';
        
        // Puerto (normalmente 3306, pero verifica en tu panel IONOS)
        $port = 3306;
        
    } else {
        // ==============================================
        // CONFIGURACIÓN PARA DESARROLLO LOCAL
        // ==============================================
        $host = 'localhost';
        $dbname = 'navegacion_upiita';
        $username = 'root';
        $password = '';
        $port = 3306;
    }

    // Construir DSN
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    
    // Opciones de PDO
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
    ];
    
    // Intentar conexión
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Configurar zona horaria en MySQL
    $pdo->exec("SET time_zone = '-06:00'"); // Ciudad de México
    
} catch (PDOException $e) {
    // Manejo de errores
    if (!$is_production) {
        // En desarrollo, mostrar el error completo
        die("Error de conexión a la base de datos: " . $e->getMessage() . 
            "<br>DSN utilizado: " . $dsn);
    } else {
        // En producción, registrar el error y mostrar mensaje genérico
        error_log("Error de conexión PDO: " . $e->getMessage());
        
        // Página de error amigable
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error - UPIITA</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .error-container {
                    text-align: center;
                    padding: 40px;
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                    max-width: 500px;
                }
                .error-icon {
                    font-size: 64px;
                    color: #dc3545;
                    margin-bottom: 20px;
                }
                h1 {
                    color: #333;
                    margin-bottom: 10px;
                }
                p {
                    color: #666;
                    margin-bottom: 20px;
                }
                a {
                    display: inline-block;
                    padding: 10px 20px;
                    background: #007bff;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                }
                a:hover {
                    background: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="error-container">
                <div class="error-icon">⚠️</div>
                <h1>Error de conexión</h1>
                <p>Lo sentimos, estamos experimentando problemas técnicos. Por favor, intenta más tarde.</p>
                <a href="/">Volver al inicio</a>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Función helper para verificar la conexión
function verificarConexion() {
    global $pdo;
    try {
        $pdo->query('SELECT 1');
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Función para obtener información de la conexión (solo en desarrollo)
function infoConexion() {
    global $pdo, $is_production;
    
    if ($is_production) {
        return "Información no disponible en producción";
    }
    
    try {
        $info = [];
        $info['version'] = $pdo->query('SELECT VERSION()')->fetchColumn();
        $info['database'] = $pdo->query('SELECT DATABASE()')->fetchColumn();
        $info['charset'] = $pdo->query('SHOW VARIABLES LIKE "character_set_database"')->fetch()['Value'];
        $info['collation'] = $pdo->query('SHOW VARIABLES LIKE "collation_database"')->fetch()['Value'];
        
        return $info;
    } catch (PDOException $e) {
        return "Error obteniendo información: " . $e->getMessage();
    }
}

// NOTA IMPORTANTE PARA IONOS:
// 1. Encuentra tus credenciales de base de datos en el panel de control de IONOS
// 2. Ve a "Bases de datos y Webspace" > "Bases de datos MySQL"
// 3. Ahí encontrarás:
//    - Nombre de la base de datos (ejemplo: dbs12345678)
//    - Nombre de usuario (ejemplo: dbu12345678)
//    - Servidor/Host (generalmente localhost o una IP)
// 4. La contraseña la estableciste al crear la base de datos

// Si tienes problemas de conexión en IONOS:
// 1. Verifica que la base de datos esté activa en el panel
// 2. Confirma que el usuario tenga permisos sobre la base de datos
// 3. Algunos planes de IONOS requieren usar conexiones por socket
// 4. Si sigues con problemas, contacta al soporte de IONOS