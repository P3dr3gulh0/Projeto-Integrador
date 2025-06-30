<?php
/**
 * Ficheiro de configuração da base de dados
 * Mova este ficheiro para fora do diretório público em produção
 */

// Configurações da base de dados
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // ALTERE ESTA SENHA EM PRODUÇÃO
define('DB_NAME', 'trustwork');
define('DB_CHARSET', 'utf8mb4');

// Configurações de segurança
define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_TIMEOUT', 3600); // 1 hora em segundos

// Configurações gerais
define('SITE_URL', 'http://localhost/trustwork'); // Altere para o URL correto em produção
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutos em segundos
?>

